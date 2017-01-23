<?php

namespace QuidditchBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use QuidditchBundle\Entity\Equipe;

class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Equipe1', EntityType::class, array(
                'class' => 'QuidditchBundle\Entity\Equipe',
                'choice_label' => 'nom'
            ))
            ->add('Equipe2', EntityType::class, array(
                'class' => 'QuidditchBundle\Entity\Equipe',
                'choice_label' => 'nom'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'quidditch_bundle_game_type';
    }
}
