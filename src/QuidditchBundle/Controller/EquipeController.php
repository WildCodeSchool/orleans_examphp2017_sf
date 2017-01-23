<?php

namespace QuidditchBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use QuidditchBundle\Entity\Equipe;
use QuidditchBundle\Form\EquipeType;

/**
 * Equipe controller.
 *
 * @Route("/quidditch/equipe")
 */
class EquipeController extends Controller
{
    /**
     * Lists all Equipe entities.
     *
     * @Route("/", name="equipe_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $equipes = $em->getRepository('QuidditchBundle:Equipe')->findAll();

        return $this->render('equipe/index.html.twig', array(
            'equipes' => $equipes,
        ));
    }

    /**
     * Creates a new Equipe entity.
     *
     * @Route("/new", name="equipe_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $equipe = new Equipe();
        $form = $this->createForm('QuidditchBundle\Form\EquipeType', $equipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($equipe);
            $em->flush();

            return $this->redirectToRoute('equipe_show', array('id' => $equipe->getId()));
        }

        return $this->render('equipe/new.html.twig', array(
            'equipe' => $equipe,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/game/new", name="game_new")
     * @Method({"GET", "POST"})
     */
    public function gameAction(Request $request)
    {

        $form = $this->createForm('QuidditchBundle\Form\GameType');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $equipes = $form->getData();
            $equipe1 = $equipes['Equipe1']->getId();
            $equipe2 = $equipes['Equipe2']->getId();

            return $this->redirectToRoute('game_show', array('equipe1' => $equipe1, 'equipe2' => $equipe2 ));
        }

        return $this->render('equipe/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/game/show/{equipe1}/{equipe2}", name="game_show")
     * @Method("GET")
     */
    public function gameShowAction($equipe1, $equipe2)
    {
        $em = $this->getDoctrine()->getManager();
        $equipes = $em->getRepository('QuidditchBundle:Equipe')->findMatch($equipe1,$equipe2);

        return $this->render('game/match.html.twig', array(
            'equipes' => $equipes,
        ));
    }

    /**
     * Finds and displays a Equipe entity.
     *
     * @Route("/{id}", name="equipe_show")
     * @Method("GET")
     */
    public function showAction(Equipe $equipe)
    {
        $deleteForm = $this->createDeleteForm($equipe);

        return $this->render('equipe/show.html.twig', array(
            'equipe' => $equipe,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Equipe entity.
     *
     * @Route("/{id}/edit", name="equipe_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Equipe $equipe)
    {
        $deleteForm = $this->createDeleteForm($equipe);
        $editForm = $this->createForm('QuidditchBundle\Form\EquipeType', $equipe);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($equipe);
            $em->flush();

            return $this->redirectToRoute('equipe_edit', array('id' => $equipe->getId()));
        }

        return $this->render('equipe/edit.html.twig', array(
            'equipe' => $equipe,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Equipe entity.
     *
     * @Route("/{id}", name="equipe_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Equipe $equipe)
    {
        $form = $this->createDeleteForm($equipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($equipe);
            $em->flush();
        }

        return $this->redirectToRoute('equipe_index');
    }

    /**
     * Creates a form to delete a Equipe entity.
     *
     * @param Equipe $equipe The Equipe entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Equipe $equipe)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('equipe_delete', array('id' => $equipe->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
