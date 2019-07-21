<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MainPageController extends Controller
{
//    ROUTING TO LOGIN
    public function mainPageAction(Request $request){
        return $this->render('AppBundle:MainPage:main-page.html.twig');
        // echo "main page";
        // die();
    }
}
