<?php

namespace QuidditchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use QuidditchBundle\Entity\Equipe;
use QuidditchBundle\Entity\Joueur;


class DefaultController extends Controller
{
    /**
     * @Route("/quidditch")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm('QuidditchBundle\Form\GameType');
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $equipes = $em->getRepository('QuidditchBundle:Equipe')->findAll();
        $joueurs = $em->getRepository('QuidditchBundle:Joueur')->findAll();

        // récupérer les données du formulaire pour cibler le calcul / équipe
        $sum_age = 0;
        $sum_exp = 0;
        foreach ($joueurs as $joueur){
            $em = $this->getDoctrine()->getManager();
            $joueurs = $em->getRepository('QuidditchBundle:Joueur')->findAll();
            $sum_age += $joueur->getAge();
            $sum_exp += $joueur->getExperience();
        }
        $average_age = $sum_age / count($joueurs);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $data = $form->getData();
            $équipe1 = $form['equipe1']->getData();
            $équipe2 = $form['equipe2']->getData();

//            $equipe1 = $em->getRepository('QuidditchBundle:Equipe')->findby(array('id'=>'ASC'));
        }


        return $this->render('QuidditchBundle:Default:index.html.twig', array(
            'equipes' =>$equipes,
            'joueurs' => $joueurs,
            'form' => $form->createView()
        ));
    }
}
