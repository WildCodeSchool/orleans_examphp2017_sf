<?php

namespace QuidditchBundle\Controller;

use QuidditchBundle\Entity\Team;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Default controller.
 *
 * @Route("/quidditch")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="accueil")
     */
    public function indexAction()
    {
        return $this->render('QuidditchBundle:Default:index.html.twig');
    }

    /**
     * @Route("/play", name="play")
     */
    public function playAction(Request $request)
    {
        $team = new Team;

//        $form = $this->createForm('QuidditchBundle\Form\PlayForm',$team);

        $form = $this->createFormBuilder($team)
            ->add('name', EntityType::class,array(
                'class'=>'QuidditchBundle:Team',
                'choice_label'=> 'name',
                'expanded' => true,
                'multiple' => true,
                'required' => true,
                'label' => 'Choisissez deux équipes',
            ))
            ->add('lancer le jeu',SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $teams = $form->getData();


            return $this->render('QuidditchBundle::result.html.twig',array(
                'teams'=>$teams,
            ));
        }

        return $this->render('QuidditchBundle::play.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
