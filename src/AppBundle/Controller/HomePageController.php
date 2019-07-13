<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomePageController extends Controller
{
//    ROUTING TO LOGIN
    public function homePageAction(Request $request){
        return $this->render('AppBundle:HomePage:home-page.html.twig');
    }
}
