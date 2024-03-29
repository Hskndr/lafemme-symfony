<?php

namespace AppBundle\Controller;

use BackendBundle\Entity\Publication;
use BackendBundle\Entity\User;
use BackendBundle\Entity\Like;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\PublicationType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class LikeController extends Controller
{
    public function likeAction($id = null)
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $publication_repo = $em->getRepository('BackendBundle:Publication');
        $publication = $publication_repo->find($id);

        $like = new Like();
        $like->setUser($user);
        $like->setPublication($publication);

        $em->persist($like);
        $flush = $em->flush();

        if ($flush == null) {
//            NOTIFICATION SERVICES
            $notification = $this->get('app.notification_service');
            $notification->set(
                $publication->getUser(),
                'like', $user->getId(),
                $publication->getId()
            );
            // NORMAL CODE
            $status = 'like it!';
        } else {
            $status = 'like failed!';
        }
        return new Response($status);

    }

    public function unLikeAction($id = null)
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $like_repo = $em->getRepository('BackendBundle:Like');
        $like = $like_repo->findOneBy(array(
            'user' => $user,
            'publication' => $id
        ));
        $em->remove($like);
        $flush = $em->flush();

        if ($flush == null) {
            $status = 'Unliked!';
        } else {
            $status = 'Unliked Failed!';
        }
        return new Response($status);

    }

    public function likesAction(Request $request, $nickname = null)
    {
        $em = $this->getDoctrine()->getManager();

        if ($nickname != null) {
            $user_repo = $em->getRepository('BackendBundle:User');
            $user = $user_repo->findOneBy(array("nick" => $nickname));
        } else {
            $user = $this->getUser();
        }
        if (empty($user) || !is_object($user)) {
            return $this->redirect($this->generateUrl('home_publications'));
        }

        $user_id = $user->getId();
        $dql = "SELECT l FROM BackendBundle:Like l WHERE l.user = $user_id ORDER BY l.id DESC";
        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $likes = $paginator->paginate(
            $query, $request->query->getInt('page', 1), 5
        );

        return $this->render('AppBundle:Like:likes.html.twig', array(
            'user' => $user,
            'pagination' => $likes
        ));

    }

}
