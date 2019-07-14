<?php

namespace AppBundle\Controller;

use BackendBundle\Entity\User;
use BackendBundle\Entity\Following;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;


class FollowingController extends Controller
{
    private $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    public function followAction(Request $request)
    {
        //ACTUAL USER
        $user = $this->getUser();
        // USER TO FOLLOW
        $followed_id = $request->get('followed');

        $em = $this->getDoctrine()->getManager();

        $user_repo = $em->getRepository('BackendBundle:User');
        $followed = $user_repo->find($followed_id);

        $following = new Following();
        $following->setUser($user);
        $following->setFollowed($followed);

        $em->persist($following);
        $flush = $em->flush();

        if ($flush == null) {
            $status = "Following";
        } else {
            $status = "Not Following";
        }
        return new Response($status);
    }


    public function unfollowAction(Request $request)
    {
        //ACTUAL USER
        $user = $this->getUser();
        // USER TO FOLLOW
        $followed_id = $request->get('followed');

        $em = $this->getDoctrine()->getManager();

        $following_repo = $em->getRepository('BackendBundle:Following');
        $followed = $following_repo->findOneBy(array(
            "user" => $user,
            'followed' => $followed_id
        ));

        $em->remove($followed);

        $flush = $em->flush();

        if ($flush == null) {
            $status = "Unfollowing";
        } else {
            $status = "Not Unfollowing";
        }
        return new Response($status);
    }

//    END CLASS
}