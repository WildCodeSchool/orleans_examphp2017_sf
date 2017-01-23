<?php

namespace QuidditchBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
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
            ->add('experience', NumberType::class, [
                'required' => false,
                'attr' => [
                    'placeholder' => 'Ceci est généré aléatoirement.'
                ]
            ])
            ->add('age', NumberType::class, [
                'required' => false,
                'attr' => [
                    'placeholder' => 'Ceci est généré aléatoirement.'
                ]
            ])
            ->add('fatigue', NumberType::class, [
                'required' => false,
                'attr' => [
                    'placeholder' => 'Ceci est généré aléatoirement.'
                ]
            ])
            ->add('role', ChoiceType::class, [
                'choices' => [
                    'Gardien' => 'Gardien',
                    'Attrapeur' => 'Attrapeur',
                    'Batteur' => 'Batteur',
                    'Poursuiveur' => 'Poursuiveur',
                ]
            ])
            ->add('equipe', EntityType::class, [
                'class' => 'QuidditchBundle\Entity\Equipe',
                'choice_label' => 'nom'
            ])
            ->add('image', FileType::class, [
                'data_class' => null,
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
