<?php

namespace AppBundle\Controller;


use AppBundle\Form\PrivateMessageType;
use BackendBundle\Entity\User;
use BackendBundle\Entity\PrivateMessage;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;


class PrivateMessageController extends Controller
{
    private $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $private_message = new PrivateMessage();
        $form = $this->createForm(PrivateMessageType::class, $private_message, array(
            'empty_data' => $user
        ));

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                //UPLOAD IMAGE
                $file = $form['image']->getData();

                if (!empty($file) && $file != null) {
                    $ext = $file->guessExtension();
                    if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                        $file_name = $user->getId() . time() . "." . $ext;
                        $file->move("uploads/messages/images", $file_name);

                        $private_message->setImage($file_name);
                    } else {
                        $private_message->setImage(null);
                    }
                } else {
                    $private_message->setImage(null);
                }
                //UPLOAD FILE DOCUMENT
                $doc = $form['file']->getData();

                if (!empty($doc) && $doc != null) {
                    $ext = $doc->guessExtension();
                    if ($ext == 'pdf') {
                        $file_name = $user->getId() . time() . "." . $ext;
                        $doc->move("uploads/messages/documents", $file_name);

                        $private_message->setFile($file_name);
                    } else {
                        $private_message->setFile(null);
                    }
                } else {
                    $private_message->setFile(null);
                }

                $private_message->setEmitter($user);
                $private_message->setCreatedAt(new \DateTime("now"));

                $private_message->setReaded(0);

                $em->persist($private_message);

                $flush = $em->flush();

                if ($flush == null) {
                    $status = 'Message sent!';
                } else {
                    $status = 'Message has no sent!';
                }


            } else {
                $status = "Message has no sent!";
            }
            $this->session->getFlashBag()->add("status", $status);
            return $this->redirectToRoute("private_message_index");

        }

        return $this->render('AppBundle:PrivateMessage:index.html.twig', array(
            'form' => $form->createView()
        ));
    }

// END CLASS
}
