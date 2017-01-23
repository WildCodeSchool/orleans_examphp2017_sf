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
	    $form = $this->createForm('QuidditchBundle\Form\FormType');
	    $form->handleRequest($request);
	    $em = $this->getDoctrine()->getManager();
	    $equipes = $em->getRepository('QuidditchBundle:Equipe')->findall();
	    $joueurs = $em->getRepository('QuidditchBundle:Joueur')->findall();
	    if ($form->isSubmitted() && $form->isValid()) {
		    $data = $form->getData();
		    $equipes = $em->getRepository('QuidditchBundle:Equipe')->findBy($data['nom']);
		    $joueurs = $em->getRepository('QuidditchBundle:Joueur')->findBy($data['nom']);


	    }

	    return $this->render(
		    'QuidditchBundle:Default:index.html.twig',
		    [
			    'form' => $form->createView(),
			    'equipes' => $equipes,
			    'joueurs' => $joueurs,
		    ]
	    );
    }
}
