<?php

namespace QuidditchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use QuidditchBundle\Entity\Equipe;
use QuidditchBundle\Entity\Joueur;


class DefaultController extends Controller
{
    /**
     * @Route("/quidditch")
     */
    public function indexAction(Request $request, Joueur $joueur)
    {
        $form = $this->createForm('QuidditchBundle\Form\RechercheType');
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $equipes = $em->getRepository('QuidditchBundle:Joueur')->findBy([], ['equipe' =>'ASC']);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $equipes = $em->getRepository('QuidditchBundle:Joueur')->findBy([], ['equipe' =>'ASC']);
        }
        return $this->render('QuidditchBundle:Default:index.html.twig', [
            'form' => $form->createView(),
            'equipes' => $equipes,
        ]);
    }
}
