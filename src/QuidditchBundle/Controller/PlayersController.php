<?php

namespace QuidditchBundle\Controller;

use QuidditchBundle\Entity\Players;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Player controller.
 *
 * @Route("players")
 */
class PlayersController extends Controller
{
    /**
     * Lists all player entities.
     *
     * @Route("/", name="players_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $players = $em->getRepository('QuidditchBundle:Players')->findAll();

        return $this->render('players/index.html.twig', array(
            'players' => $players,
        ));
    }

    /**
     * Creates a new player entity.
     *
     * @Route("/new", name="players_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $experience = rand(20, 80);
        $fatigue    = rand(0, 20);
        $age        = rand(18, 20);

        $player = new Players();
        $form = $this->createForm('QuidditchBundle\Form\PlayersType', $player);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $image=$player->getImage();
            $imageName = md5(uniqid()).'.'.$image->guessExtension();
            $image->move(
                $this->getParameter('upload_directory'),
                $imageName
            );
            $player->setImage($imageName);


            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush($player);

            return $this->redirectToRoute('players_show', array('id' => $player->getId()));
        }

        return $this->render('players/new.html.twig', array(
            'player' => $player,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a player entity.
     *
     * @Route("/{id}", name="players_show")
     * @Method("GET")
     */
    public function showAction(Players $player)
    {
        $deleteForm = $this->createDeleteForm($player);

        return $this->render('players/show.html.twig', array(
            'player' => $player,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing player entity.
     *
     * @Route("/{id}/edit", name="players_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Players $player)
    {
        $deleteForm = $this->createDeleteForm($player);
        $editForm = $this->createForm('QuidditchBundle\Form\PlayersType', $player);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('players_edit', array('id' => $player->getId()));
        }

        return $this->render('players/edit.html.twig', array(
            'player' => $player,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a player entity.
     *
     * @Route("/{id}", name="players_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Players $player)
    {
        $form = $this->createDeleteForm($player);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($player);
            $em->flush($player);
        }

        return $this->redirectToRoute('players_index');
    }

    /**
     * Creates a form to delete a player entity.
     *
     * @param Players $player The player entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Players $player)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('players_delete', array('id' => $player->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}