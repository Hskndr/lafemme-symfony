<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BuyCreditController extends Controller
{
//    ROUTING TO LOGIN
    public function buyCreditAction(Request $request)
    {
        return $this->render('AppBundle:BuyCredit:buy_credit.html.twig');
        // echo "Buy Credit";
        // die();
    }


}
