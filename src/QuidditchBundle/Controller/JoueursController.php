<?php

namespace QuidditchBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use QuidditchBundle\Entity\Joueurs;
use QuidditchBundle\Form\JoueursType;

/**
 * Joueurs controller.
 *
 * @Route("/joueurs")
 */
class JoueursController extends Controller
{
    /**
     * Lists all Joueurs entities.
     *
     * @Route("/", name="joueurs_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $joueurs = $em->getRepository('QuidditchBundle:Joueurs')->findAll();

        return $this->render('joueurs/index.html.twig', array(
            'joueurs' => $joueurs,
        ));
    }

    /**
     * Creates a new Joueurs entity.
     *
     * @Route("/new", name="joueurs_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $joueur = new Joueurs();
        $form = $this->createForm('QuidditchBundle\Form\JoueursType', $joueur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($joueur);
            $em->flush();

            return $this->redirectToRoute('joueurs_show', array('id' => $joueur->getId()));
        }

        return $this->render('joueurs/new.html.twig', array(
            'joueur' => $joueur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Joueurs entity.
     *
     * @Route("/{id}", name="joueurs_show")
     * @Method("GET")
     */
    public function showAction(Joueurs $joueur)
    {
        $deleteForm = $this->createDeleteForm($joueur);

        return $this->render('joueurs/show.html.twig', array(
            'joueur' => $joueur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Joueurs entity.
     *
     * @Route("/{id}/edit", name="joueurs_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Joueurs $joueur)
    {
        $deleteForm = $this->createDeleteForm($joueur);
        $editForm = $this->createForm('QuidditchBundle\Form\JoueursType', $joueur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($joueur);
            $em->flush();

            return $this->redirectToRoute('joueurs_edit', array('id' => $joueur->getId()));
        }

        return $this->render('joueurs/edit.html.twig', array(
            'joueur' => $joueur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Joueurs entity.
     *
     * @Route("/{id}", name="joueurs_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Joueurs $joueur)
    {
        $form = $this->createDeleteForm($joueur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($joueur);
            $em->flush();
        }

        return $this->redirectToRoute('joueurs_index');
    }

    /**
     * Creates a form to delete a Joueurs entity.
     *
     * @param Joueurs $joueur The Joueurs entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Joueurs $joueur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('joueurs_delete', array('id' => $joueur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
