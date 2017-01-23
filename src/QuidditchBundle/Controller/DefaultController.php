<?php

namespace QuidditchBundle\Controller;

use QuidditchBundle\Entity\Equipe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use QuidditchBundle\Entity\Joueur;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="match")
     *
     */
    public function MatchAction(Request $request)
    {
        $erreur = null;
        $form = $this->createForm('QuidditchBundle\Form\MatchType');
        $form->handleRequest($request);
//        var_dump($form->getData());

        $em = $this->getDoctrine()->getManager();
        $moyage1 = $moyage2 = $moyfatigue1 = $moyfatigue2 = $equipegagnante= $point1= $point2= $experiance1 = $experiance2 = 0;

        $submit = 0;
        if ($form->isSubmitted() && $form->isValid()) {
            $submit = 1;
            $equipe1id=$form->getData()['equipe1'];
            $equipe2id=$form->getData()['equipe2'];
            if ($equipe1id != $equipe2id ) {

                $equipe1 = $em->getRepository('QuidditchBundle:Equipe')->find($equipe1id);
                $equipe2 = $em->getRepository('QuidditchBundle:Equipe')->find($equipe2id);

                $experiance1 = $age1 = $fatigue1 = 0;
                $jequipe1 = $equipe1->getJoueurs();
                $nbjoueur = $moyfatigue1 = 0;
                foreach ($jequipe1 as $item1) {
                    $experiance1 += $item1->getExperiance();
                    $age1 += $item1->getAge();
                    $fatigue1 += $item1->getFatigue();
                    $nbjoueur++;
                }
                $moyage1 = $age1 / $nbjoueur;
                $moyfatigue1 = $age1 / $nbjoueur;

                $experiance2 = $age2 = $fatigue2 = 0;
                $jequipe2 = $equipe2->getJoueurs();
                $nbjoueur2 = $moyfatigue2 = 0;
                foreach ($jequipe2 as $item2) {
                    $experiance2 += $item2->getExperiance();
                    $age2 += $item2->getAge();
                    $fatigue2 += $item2->getFatigue();
                    $nbjoueur2++;
                }
                $moyage2 = $age2 / $nbjoueur2;
                $moyfatigue2 = $age2 / $nbjoueur2;

                $point1 = ($experiance1 / $nbjoueur) * ($moyfatigue1 / 100);
                $point2 = ($experiance2 / $nbjoueur2) * ($moyfatigue2 / 100);
                if ($moyage1 < $moyage2) {
                    $point1 = $point1 * 1.1;
                } elseif ($moyage1 > $moyage2) {
                    $point2 = $point2 * 1.1;
                }
                if ($point1 < $point2) {
                    $equipegagnante = $equipe2->getNom();
                } elseif ($point1 > $point2) {
                    $equipegagnante = $equipe1->getNom();
                } else {
                    $equipegagnante = 'match null';
                }

                if($equipegagnante == $equipe1->getNom()) {
                    $joueurs1 = $equipe1->getJoueurs();
                    foreach ($joueurs1 as $joueur1) {

                        $joueurw = $em->getRepository('QuidditchBundle:Joueur')->find($joueur1);
                        $expe = $joueurw->getExperiance();
                        $experiancew = round($expe * (rand(105, 110) / 100));

                        $joueurw->setExperiance($experiancew);
                        $em->persist($joueurw);
                    }
                    $joueurs2 = $equipe2->getJoueurs();
                    foreach ($joueurs2 as $joueur2) {

                        $joueurl = $em->getRepository('QuidditchBundle:Joueur')->find($joueur2);
                        $expe = $joueurl->getExperiance();
                        $experiancel = round($expe * (rand(100, 105) / 100));

                        $joueurl->setExperiance($experiancel);
                        $em->persist($joueurl);
                    }
                } else {
                    $joueurs2 = $equipe1->getJoueurs();
                    foreach ($joueurs2 as $joueur2) {

                        $joueurw = $em->getRepository('QuidditchBundle:Joueur')->find($joueur2);
                        $expe = $joueurw->getExperiance();
                        $experiancew = round($expe * (rand(105, 110) / 100));

                        $joueurw->setExperiance($experiancew);
                        $em->persist($joueurw);
                    }
                    $joueurs1 = $equipe1->getJoueurs();
                    foreach ($joueurs1 as $joueur1) {

                        $joueurl = $em->getRepository('QuidditchBundle:Joueur')->find($joueur1);
                        $expe = $joueurl->getExperiance();
                        $experiancel = round($expe * (rand(100, 105) / 100));

                        $joueurl->setExperiance($experiancel);
                        $em->persist($joueurl);

                    }
                }
                    $em->flush();
            }else{
                $erreur = 1;
            }
        }


        return $this->render('QuidditchBundle:Default:match.html.twig', array(
            'form' => $form->createView(),
            'moyage1'=>$moyage1,
            'moyage2'=>$moyage2,
            'moyfatigue1'=>$moyfatigue1,
            'moyfatigue2'=>$moyfatigue2,
            'equipegagnante' => $equipegagnante,
            'point1' => $point1,
            'point2' => $point2,
            'experiance1' => $experiance1,
            'experiance2' => $experiance2,
            'erreur' => $erreur,
            'submit' => $submit,
        ));

    }
}
