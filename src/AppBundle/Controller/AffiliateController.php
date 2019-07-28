<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AffiliateController extends Controller
{
//    ROUTING TO LOGIN
    public function signInAction(Request $request)
    {
        return $this->render('AppBundle:Affiliate:affiliate_signin.html.twig');
        // echo "Buy Credit";
        // die();
    }


}
