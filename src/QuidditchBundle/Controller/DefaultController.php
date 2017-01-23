<?php

namespace QuidditchBundle\Controller;

use QuidditchBundle\Entity\Game;
use QuidditchBundle\Form\GameType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use QuidditchBundle\Entity\Team;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FormType;


class DefaultController extends Controller
{
    /**
     * @Route("/quidditch")
     */
    public function indexAction(Request $request)
    {

        $team = new team();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $team);
        $formBuilder
            ->add('name', EntityType::class, [
                'class' => 'QuidditchBundle\Entity\Team',
                'choice_label' => 'name',
                'choice_name' => 'equipe'])
            ->add('name', EntityType::class, [
                'class' => 'QuidditchBundle\Entity\Team',
                'choice_label' => 'name'])
            ->add('début du match', SubmitType::class);

        $form = $formBuilder->getForm();

        if ($form->isSubmitted() && $form->isValid()) {

            return $this->redirectToRoute('result');
        }

        return $this->render('QuidditchBundle:Default:index.html.twig', array('form' => $form->createView(),
        ));
    }

    /**
     * @Route("/result", name="result")
     */
    public function resultAction()
    {
        return $this->render('QuidditchBundle:Default:result.html.twig');
    }


}
