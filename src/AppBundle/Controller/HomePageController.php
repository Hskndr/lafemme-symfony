<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomePageController extends Controller
{
//    ROUTING TO LOGIN
    public function homePageAction(Request $request){
        echo "Action Home Page";
        die();
    }
}
