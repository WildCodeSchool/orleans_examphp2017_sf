<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 23/01/17
 * Time: 16:47
 */

namespace QuidditchBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GameType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('team1', EntityType::class, array('class'=> 'QuidditchBundle:Team',
                'choice_label' => 'name',

                'label' => 'Choose First Team',
                'multiple'=>false,
                'expanded'=>false
            ))
            ->add('team2', EntityType::class, array('class'=> 'QuidditchBundle:Team',
                'choice_label' => 'name',

                'label' => 'Choose First Team',
                'multiple'=>false,
                'expanded'=>false
            ))

        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => null
        ));
    }

}