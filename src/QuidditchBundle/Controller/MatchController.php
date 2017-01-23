<?php

namespace QuidditchBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use QuidditchBundle\Entity\Equipe;
use QuidditchBundle\Form\EquipeType;


/**
 * Match controller.
 *
 * @Route("/match")
 */
class MatchController extends Controller
{
    /**
     * Match
     *
     * @Route("/", name="match")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm('QuidditchBundle\Form\MatchType');
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $equipes = $em->getRepository('QuidditchBundle:Equipe')->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $equipes  = $em->getRepository('QuidditchBundle:Equipe')->findByEquipeMatch($data);

            return $this->render('@Quidditch/Default/resultatMatch.html.twig', array(
                'equipes' => $equipes,
            ));
        }

        return $this->render('@Quidditch/Default/match.html.twig', [
            'form'=>$form->createView(),
            'equipes'=>$equipes,
        ]);
    }
}
