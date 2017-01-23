<?php

namespace QuidditchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/quidditch")
     */


    public function indexAction(Request $request)
    {
        $form = $this->createForm('QuidditchBundle\Form\PlayerType');
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $players = $em->getRepository('QuidditchBundle:Player')->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $players  = $em->getRepository('QuidditchBundle:Player')->findByMySearch($data);

        }
        return $this->render('QuidditchBundle:Default:index.html.twig', [
            'form'=>$form->createView(),
            'players'=>$players,
        ]);
    }
}
