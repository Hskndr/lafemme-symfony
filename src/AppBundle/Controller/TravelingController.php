<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TravelingController extends Controller
{
//    ROUTING TO LOGIN
    public function travelingAction(Request $request)
    {
        return $this->render('AppBundle:Traveling:traveling.html.twig');
        // echo "Buy Credit";
        // die();
    }


}
