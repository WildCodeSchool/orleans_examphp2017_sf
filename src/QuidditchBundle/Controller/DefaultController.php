<?php

namespace QuidditchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm('QuiddtichBundle\Form\RechercheType');
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $players = $em->getRepository('QuiddtichBundle:Player')->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $players = $em->getRepository('QuidditchBundle:Player')->findBy([
                'experience'=>$data['experience'],
                'age'=>$data['age'],
                'fatigue'=>$data['fatigue'],
            ]);

        }

        return $this->render('QuidditchBundle:Default:index.html.twig', [
            'form'=>$form->createView(),
            'player'=>$players,
        ]);
    }
}
