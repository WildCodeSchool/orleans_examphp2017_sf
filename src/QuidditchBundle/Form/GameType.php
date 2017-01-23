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
            ->add('equipe1', EntityType::class, array('class' => 'QuidditchBundle:Equipe',
                    'choice_label' => 'nom',
                    'mapped' => false,
                    'label' => 'Adversaire 1',
                    'expanded' => false,
                    'multiple' => false,
                ))
            ->add('equipe2', EntityType::class, array('class' => 'QuidditchBundle:Equipe',
                'choice_label' => 'nom',
                'mapped' => false,
                'label' => 'Adversaire 2',
                'expanded' => false,
                'multiple' => false,
            ))
            ->add('submit', SubmitType::class)
                    ;

//        $builder
//            ->add('équipe1', EntityType::class, array('class' => 'QuidditchBundle:Equipe',
//                'choice_label' => 'id',
//                'label' => 'Quels joueurs la compose?',
//                'expanded' => true,
//                'multiple' => true,
//            ))
//            ->add('équipe2', EntityType::class, array('class' => 'QuidditchBundle:Equipe',
//                'choice_label' => 'id',
//                'label' => 'Quels joueurs la compose?',
//                'expanded' => true,
//                'multiple' => true,
//            ))
//        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'quidditch_bundle_game_type';
    }
}
