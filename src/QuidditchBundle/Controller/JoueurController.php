<?php

namespace QuidditchBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use QuidditchBundle\Entity\Joueur;
use QuidditchBundle\Form\JoueurType;

/**
 * Joueur controller.
 *
 * @Route("/quidditch/joueur")
 */
class JoueurController extends Controller
{
    /**
     * Lists all Joueur entities.
     *
     * @Route("/", name="joueur_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $joueurs = $em->getRepository('QuidditchBundle:Joueur')->findAll();

        return $this->render('joueur/index.html.twig', array(
            'joueurs' => $joueurs,
        ));
    }

    /**
     * Creates a new Joueur entity.
     *
     * @Route("/new", name="joueur_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $joueur = new Joueur();
        $em = $this->getDoctrine()->getManager();
        $equipe = $em->getRepository('QuidditchBundle:Equipe')->findAll();
        $form = $this->createForm('QuidditchBundle\Form\JoueurType', $joueur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() ) {
            $joueur->setAge(rand(18,30));
            $joueur->setExperience(rand(20,80));
            $joueur->setFatigue(rand(0,20));
            $em = $this->getDoctrine()->getManager();
            $em->persist($joueur);
            $em->flush();

            return $this->redirectToRoute('joueur_show', array('id' => $joueur->getId()));
        }

        return $this->render('joueur/new.html.twig', array(
            'joueur' => $joueur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Joueur entity.
     *
     * @Route("/{id}", name="joueur_show")
     * @Method("GET")
     */
    public function showAction(Joueur $joueur)
    {
        $deleteForm = $this->createDeleteForm($joueur);

        return $this->render('joueur/show.html.twig', array(
            'joueur' => $joueur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Joueur entity.
     *
     * @Route("/{id}/edit", name="joueur_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Joueur $joueur)
    {
        $deleteForm = $this->createDeleteForm($joueur);
        $editForm = $this->createForm('QuidditchBundle\Form\JoueurType', $joueur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($joueur);
            $em->flush();

            return $this->redirectToRoute('joueur_edit', array('id' => $joueur->getId()));
        }

        return $this->render('joueur/edit.html.twig', array(
            'joueur' => $joueur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Joueur entity.
     *
     * @Route("/{id}", name="joueur_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Joueur $joueur)
    {
        $form = $this->createDeleteForm($joueur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($joueur);
            $em->flush();
        }

        return $this->redirectToRoute('joueur_index');
    }

    /**
     * Creates a form to delete a Joueur entity.
     *
     * @param Joueur $joueur The Joueur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Joueur $joueur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('joueur_delete', array('id' => $joueur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}