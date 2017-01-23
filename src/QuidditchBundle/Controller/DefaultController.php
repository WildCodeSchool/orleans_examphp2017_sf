<?php

namespace QuidditchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use QuidditchBundle\Entity\Equipe;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use QuidditchBundle\Entity\Joueur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;




class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $equipes = $em->getRepository('QuidditchBundle:Equipe')->findAll();

        return $this->render('QuidditchBundle:Default:index.html.twig', array(
            'equipes'=>$equipes,
        ));
    }

    /**
     * @Route("/team/{id}", name="team_show")
     * @Method({"GET", "POST"})
     */
    public function TeamAction(Equipe $equipe, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $joueur = $em->getRepository('QuidditchBundle:Joueur')->findBy(array( 'equipe' => null ));

        $form = $this->createForm('QuidditchBundle\Form\TeamType');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $joueur->setEquipe($equipe->getId());
            $em->flush($joueur);

            return $this->redirectToRoute('team_show', array('id' => $equipe->getId()));
        }

        return $this->render('QuidditchBundle:Default:equipe.html.twig', array(
            'equipe' => $equipe,
            'joueur' => $joueur,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/jouer", name="jouer")
     * @Method({"GET", "POST"})
     */
    public function selectTeam(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $equipes = $em->getRepository('QuidditchBundle:Equipe')->findAll();

        $form = $this->createForm('QuidditchBundle\Form\SelectTeamType');
        $form->handleRequest($request);

        $equipe1= null;
        $equipe2= null;

        if ($form->isSubmitted() && $form->isValid()) {
            $equipe1= $form['equipe1']->getData();
            $equipe2= $form['equipe2']->getData();
        }

//        $joueurs = $em->getRepository('QuidditchBundle:Joueur')->findByEquipe();


        return $this->render('QuidditchBundle:Default:selectTeam.html.twig', array(
            'equipes' => $equipes,
            'form' => $form->createView(),
            'equipe1' => $equipe1,
            'equipe2' => $equipe2,
        ));
    }

//    /**
//     * @Route("/result/{id1}/{id2}", name="result")
//     * @Method({"GET"})
//     */
//    public function resultAction(Equipe $e1, $e2)
//    {
//        $em = $this->getDoctrine()->getManager();
//        $equipe1 = $em->getRepository('QuidditchBundle:Equipe')->findById($e1);
//        $equipe2 = $em->getRepository('QuidditchBundle:Equipe')->findById($e2);
//
//
//        return $this->render('QuidditchBundle:Default:result.html.twig', array(
//            'equipe1' => $equipe1,
//            'equipe2' => $equipe2,
//        ));
//    }
}
