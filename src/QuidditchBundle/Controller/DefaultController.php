<?php

namespace QuidditchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/quidditch", name="home")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm('QuidditchBundle\Form\GameType');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $team1 = $form->get('team1')->getData();
            $team2 = $form->get('team2')->getData();
            $players1 = $team1->getPlayers();
            $exp1 = $avgAge1 = $avgFtg1 = 0;
            foreach ($players1 as $player1) {
                $exp1 += $player1->getExp();
                $avgAge1 += $player1->getAge();
                $avgFtg1 += $player1->getFatigue();
            }


            $avgFtg1 = round($avgFtg1 / 7);
            $avgAge1 = round($avgAge1 / 7);

            $players2 = $team2->getPlayers();
            $exp2 = $avgAge2 = $avgFtg2 = 0;
            foreach ($players2 as $player2) {
                $exp2 += $player2->getExp();
                $avgAge2 += $player2->getAge();
                $avgFtg2 += $player2->getFatigue();
            }
            $avgFtg2 = round($avgFtg2 / 7);
            $avgAge2 = round($avgAge2 / 7);

            return $this->render('QuidditchBundle::result.html.twig', array(
                'exp1' => $exp1,
                'exp2' => $exp2,
                'avgAge1' => $avgAge1,
                'avgAge2' => $avgAge2,
                'avgFtg1' => $avgFtg1,
                'avgFtg2' => $avgFtg2,
            ));
        }

        return $this->render('QuidditchBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
