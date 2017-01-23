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

//        $form = $this->createForm('QuidditchBundle\Form\PlayForm',$team);

        $form = $this->createFormBuilder()
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

            $team1 = $teams['name'][0];
//            var_dump($team1);
            $team2 = $teams['name'][1];
//            var_dump($team2);
            $players1 = $team1->getPlayers();
            $players2 = $team2->getPlayers();

            $team1Xp ='';
            $team1Age ='';
            $team1Fatigue ='';
            $team2Xp ='';
            $team2Age ='';
            $team2Fatigue ='';
            foreach ($players1 as $player) {
                $team1Xp += $player->getXp();
                $team1Age += $player->getAge();
                $team1Fatigue += $player->getTiredness();
            }
//            var_dump($team1Xp);
//            var_dump($team1Age);
//            var_dump($team1Fatigue);
            foreach ($players2 as $player) {
                $team2Xp += $player->getXp();
                $team2Age += $player->getAge();
                $team2Fatigue += $player->getTiredness();
            }

            return $this->render('QuidditchBundle::result.html.twig',array(
                'xp1'=>$team1Xp,
                'age1'=>$team1Age,
                'fatigue1'=>$team1Fatigue,
                'xp2'=>$team2Xp,
                'age2'=>$team2Age,
                'fatigue2'=>$team2Fatigue,
            ));
        }

        return $this->render('QuidditchBundle::play.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
