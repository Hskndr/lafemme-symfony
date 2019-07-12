<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PublicationController extends Controller
{
//    ROUTING TO PUBLICATION
    public function indexAction(Request $request){
        echo "Action Publication";
        die();
    }
}
