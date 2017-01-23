<?php

namespace QuidditchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('QuidditchBundle:Default:index.html.twig');
    }

    /**
     * @Route("/contactez-moi" )
     */
    public function formulaireAction()
    {
        return $this->render('QuidditchBundle:Default:formulaire.html.twig');
    }

    /**
     * @Route("/recherche" )
     */
    public function rechercheAction(Request $request)
    {
        $form = $this->createForm('QuidditchBundle\Form\RechercheType');
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $players = $em->getRepository('QuidditchBundle:Players')->findAll();


        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $players = $em->getRepository('QuidditchBundle:Players')->findBy(["nom"=>$data['Recherche']]);
            //return $this->redirectToRoute('recherche');
        }
        return $this->render('QuidditchBundle:Default:recherche.html.twig', [
            'form'=>$form->createView(),
            'players'=>$players,

        ]);

    }


}
