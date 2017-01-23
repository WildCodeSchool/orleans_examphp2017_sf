<?php

namespace QuidditchBundle\Form;

use Doctrine\DBAL\Types\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JoueurType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('experiance',HiddenType::class)
            ->add('age',HiddenType::class)
            ->add('fatigue',HiddenType::class)
            ->add('role',ChoiceType::class, array(
                'choices' => array(
                    'gardien' => 'gardien',
                    'attrapeur' => 'attrapeur',
                    'batteur' => 'batteur',
                    'poursuiveur' => 'poursuiveur',
                ),))
            ->add('equipe', EntityType::class, [
                'class'=> 'QuidditchBundle:Equipe',
                'choice_label' => 'nom'
            ])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QuidditchBundle\Entity\Joueur'
        ));
    }
}
