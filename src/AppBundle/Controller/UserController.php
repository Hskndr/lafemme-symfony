<?php

namespace AppBundle\Controller;

use BackendBundle\Entity\User;
use AppBundle\Form\RegisterType;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;


class UserController extends Controller
{
    private $session;

    public function __construct()
    {

        $this->session = new Session();
    }

//    ROUTING TO LOGIN
    public function loginAction(Request $request)
    {
        if (is_object($this->getUser())) {
            return $this->redirect('home');
        }
        //AUTHENTICATION SERVICE
        $authenticationUtils = $this->get('security.authentication_utils');
        // LOGIN ERROR
        $error = $authenticationUtils->getLastAuthenticationError();
        // LAST USER TRY TO AUNTHENTICATE
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('AppBundle:User:login.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error
        ));
    }

    public function registerAction(Request $request)
    {
        if (is_object($this->getUser())) {
            return $this->redirect('home');
        }

        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                // $user_repo = $em->getRepository("BackendBundle:User");
                $query = $em->createQuery('SELECT u FROM BackendBundle:User
                 u WHERE u.email = :email OR u.nick = :nick')
                    ->setParameter('email', $form->get("email")->getData())
                    ->setParameter('nick', $form->get("nick")->getData());

                $user_isset = $query->getResult();

                if (count($user_isset) == 0) {
                    $factory = $this->get("security.encoder_factory");
                    $encoder = $factory->getEncoder($user);

                    $password = $encoder->encodePassword($form->get("password")->getData(), $user->getSalt());

                    $user->setPassword($password);
                    $user->setRole("ROLE_USER");
                    $user->setImage(null);

                    //HSKNDR: PUT THE CREATE AT TEST WORKS
                    $user->setCreatedAt(new \DateTime("now"));
                    $user->setCredits(50);

                    // PERSIST THE USER
                    $em->persist($user);
                    // SAVE IN DATABASE THE USER PERSIST
                    $flush = $em->flush();

                    if ($flush == null) {
                        $status = "Register Successfully ¡¡";
                        $this->session->getFlashBag()->add("status", $status);

                        return $this->redirect("login");
                    } else {
                        $status = " Register Failed !!";
                    }

                } else {
                    $status = "Username Exist !!";
                }

            } else {
                $status = "Register Failed !!";
            }

            $this->session->getFlashBag()->add("status", $status);
        }

        return $this->render('AppBundle:User:register.html.twig', array(
            "form" => $form->createView()
        ));
    }

// TEST ALERT IF NICK EXIST IN DATABASE
    public function nickTestAction(Request $request)
    {
        $nick = $request->get("nick");

        $em = $this->getDoctrine()->getManager();
        $user_repo = $em->getRepository("BackendBundle:User");
        $user_isset = $user_repo->findOneBy(array("nick" => $nick));

        $result = "used";
        if (count($user_isset) >= 1 && is_object($user_isset)) {
            $result = "used";

        } else {
            $result = "unused";
        }

        return new Response($result);

    }

// EDIT PROFILE
    public function editUserAction(Request $request)
    {
        $user = $this->getUser();
        $user_image = $user->getImage();
        $form = $this->createForm(UserType::class, $user);


        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $query = $em->createQuery('SELECT u FROM BackendBundle:User
                 u WHERE u.email = :email OR u.nick = :nick')
                    ->setParameter('email', $form->get("email")->getData())
                    ->setParameter('nick', $form->get("nick")->getData());

                $user_isset = $query->getResult();

                if (count($user_isset) == 0 || ($user->getEmail() == $user_isset[0]->getEmail() &&
                        $user->getNick() == $user_isset[0]->getNick())) {
                    //UPLOAD FILE
                    $file = $form["image"]->getData();

                    if (!empty($file) && $file != null) {
                        //  CHECK FILE EXTENSION
                        $ext = $file->guessExtension();
                        if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                            $file_name = $user->getId() . time() . '.' . $ext;
                            $file->move("uploads/user", $file_name);

                            $user->setImage($file_name);
                        }

                    } else {
                        $user->setImage($user_image);
                    }


                    // PERSIST THE USER
                    $em->persist($user);
                    // SAVE IN DATABASE THE USER PERSIST
                    $flush = $em->flush();

                    if ($flush == null) {
                        $status = "Edit Profile Successfully ¡¡";
                    } else {
                        $status = " Edit Profile Failed !!";
                    }
                } else {
                    $status = "Username Exist !!";
                }
            } else {
                $status = "Edit Profile Failed !!";
            }
            $this->session->getFlashBag()->add("status", $status);
            return $this->redirect('my-data');
        }


        return $this->render('AppBundle:User:edit_user.html.twig', array(
            "form" => $form->createView()
        ));
    }

// PEOPLE SECTION: FIND OTHER USERS

    public function usersAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $dql = "SELECT u FROM BackendBundle:User u ORDER BY u.id ASC";
        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, $request->query->getInt('page', 1), 5
        );

        return $this->render('AppBundle:User:users.html.twig', array(
            'pagination' => $pagination
        ));
    }

// PEOPLE SECTION: FIND OTHER USERS BY SEARCH

    public function searchAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $search = trim($request->query->get("search", null));

        if ($search == null) {
            return $this->redirect($this->generateURL('home_publications'));
        }
        $dql = "SELECT u FROM BackendBundle:User u "
            . "WHERE u.name LIKE :search OR u.surname LIKE :search "
            . "OR u.nick LIKE :search ORDER BY u.id ASC";
        $query = $em->createQuery($dql)->setParameter('search', "%$search%");

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, $request->query->getInt('page', 1), 5
        );

        return $this->render('AppBundle:User:users.html.twig', array(
            'pagination' => $pagination
        ));
    }

//USER PROFILE
    public function profileAction(Request $request, $nickname = null)
    {
        $em = $this->getDoctrine()->getManager();

        if ($nickname != null) {
            $user_repo = $em->getRepository('BackendBundle:User');
            $user = $user_repo->findOneBy(array("nick" => $nickname));
        } else {
            $user = $this->getUser();
            // review $user = $this->getDoctrine();
        }
        if (empty($user) || !is_object($user)) {
            return $this->redirect($this->generateUrl('home_publications'));
        }

        $user_id = $user->getId();
        $dql = "SELECT p FROM BackendBundle:Publication p WHERE p.user = $user_id ORDER BY p.id DESC";
        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $publications = $paginator->paginate(
            $query, $request->query->getInt('page', 1), 5
        );

        return $this->render('AppBundle:User:profile.html.twig', array(
            'user' => $user,
            'pagination' => $publications
        ));

    }
}
