<?php

namespace QuidditchBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('team', EntityType::class, [
        'class' => 'QuidditchBundle\Entity\Team',
        'choice_label' => 'name'])
        ->add('team', EntityType::class, [
        'class' => 'QuidditchBundle\Entity\Team',
        'choice_label' => 'name'])
        ->add ('début', SubmitType::class);


    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'quidditch_bundle_game_type';
    }
}
