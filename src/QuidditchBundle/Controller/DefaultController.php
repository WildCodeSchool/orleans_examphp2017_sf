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
    public function indexAction(Request $request)

    {
        $form = $this->createForm('QuidditchBundle\Form\RechercheType');
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $equipes = $em->getRepository('QuidditchBundle\Entity\Equipe')->findAll();
        $joueurs = $em->getRepository('QuidditchBundle\Entity\Joueur')->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
           $joueurs =$em->getRepository('QuidditchBundle\Entity\Joueur')->findByExperiencetotale();
           //$joueurs =$em->getRepository('QuidditchBundle\Entity\Joueur')->findByEquipe('equipe');
          // $joueurs =$em->getRepository('QuidditchBundle\Entity\Joueur')->findByExperience('experience');
           //$joueurs =$em->getRepository('QuidditchBundle\Entity\Joueur')->findByFatigue('fatigue');

            //$data = $form->getData();
            //$equipes = $em->getRepository('QuidditchBundle\Entity\Equipe')->findBySuperficie($data['superficie']);

        }
        return $this->render('QuidditchBundle:Default:index.html.twig', [
            'form'=>$form->createView(),
            'equipes'=> $equipes,
            'joueurs' => $joueurs

        ]);

    }
}
