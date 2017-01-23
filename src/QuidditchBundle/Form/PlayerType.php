<?php

namespace QuidditchBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use QuidditchBundle\Entity\Player;
use QuidditchBundle\Entity\Team;

class PlayerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('xp', HiddenType::class)
            ->add('age', HiddenType::class)
            ->add('tiredness', HiddenType::class)
            ->add('role', ChoiceType::class, [
                'choices' => [
                    'goal' => 'goal keeper',
                    'attrapeur' => 'attrapeur',
                    'batteurs' => 'batteur',
                    'poursuiveur' => 'poursuiveur'
                ]
            ])
            ->add('team', EntityType::class, [
                'class' => 'QuidditchBundle\Entity\Team',
                'choice_label' => 'name']);;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QuidditchBundle\Entity\Player'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'quidditchbundle_player';
    }
}
