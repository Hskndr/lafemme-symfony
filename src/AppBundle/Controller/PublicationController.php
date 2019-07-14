<?php

namespace AppBundle\Controller;

use BackendBundle\Entity\Publication;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\PublicationType;
use Symfony\Component\HttpFoundation\Session\Session;

class PublicationController extends Controller
{
    private $session;

    public function __construct()
    {
        $this->session = new Session();
    }

//    ROUTING TO PUBLICATION
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $publication = new Publication();
        $form = $this->createForm(PublicationType::class, $publication);
        // join request with the object
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                //UPLOAD IMAGE
                $file = $form['image']->getData();

                if (!empty($file) && $file != null) {
                    $ext = $file->guessExtension();
                    if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                        $file_name = $user->getId() . time() . "." . $ext;
                        $file->move("uploads/publications/images", $file_name);

                        $publication->setImage($file_name);
                    } else {
                        $publication->setImage(null);
                    }
                } else {
                    $publication->setImage(null);
                }
                //UPLOAD FILE DOCUMENT
                $doc = $form['document']->getData();

                if (!empty($doc) && $doc != null) {
                    $ext = $doc->guessExtension();
                    if ($ext == 'pdf') {
                        $file_name = $user->getId().time().".".$ext;
                        $doc->move("uploads/documents/images", $file_name);

                        $publication->setDocument($file_name);
                    } else {
                        $publication->setDocument(null);
                    }
                } else {
                    $publication->setDocument(null);
                }

                $publication->setUser($user);
                $publication->setCreatedAt(new \DateTime("now"));
                $em->persist($publication);
                $flush = $em->flush();

                if ($flush == null) {
                    $status = 'Publication has been created.';
                } else {
                    $status = 'Publication Failed.';
                }

            } else {
                $status = 'Publication is not created, the form is invalid.';
            }
            $this->session->getFlashBag()->add("status", $status);
            return $this->redirectToRoute('home_publications');
        }


        return $this->render('AppBundle:Publication:home.html.twig', array(
            'form' => $form->createView()
        ));

    }

}
