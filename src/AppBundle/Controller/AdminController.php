<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
//    ROUTING TO LOGIN
    public function adminAction(Request $request)
    {
        return $this->render('AppBundle:Admin:admin.html.twig');
        // echo "Admin";
        // die();
    }


}
