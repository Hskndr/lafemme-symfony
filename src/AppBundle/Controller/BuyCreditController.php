<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use BackendBundle\Entity\BuyCredit;
use AppBundle\Form\BuyCreditType;

class BuyCreditController extends Controller
{
//    ROUTING TO LOGIN
    public function buyCreditAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $buy_credit = new BuyCredit();
        $form = $this->createForm(BuyCreditType::class, $buy_credit);

        // HSKNDR: WITHOUT CLASS
        //return $this->render('AppBundle:BuyCredit:buy_credit.html.twig');
        // echo "Buy Credit";
        // die();

        //HSKNDR: WITH CLASS
        return $this->render('AppBundle:BuyCredit:buy_credit.html.twig',array(
            'form'=> $form->createView()
        ));

    }


}
