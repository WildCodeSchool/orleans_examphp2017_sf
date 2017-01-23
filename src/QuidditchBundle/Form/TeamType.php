<?php

namespace QuidditchBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use QuidditchBundle\Entity\Player;

class TeamType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('country',CountryType::class)
            ->add('players',CollectionType::class, array(
                'entry_type' => EntityType::class,
                'entry_options' => array(
                    'class'=>'QuidditchBundle:Player',
                    'choice_label'=> 'name',
                    'expanded' => false,
                    'multiple' => false,
                    'required' => false,
                ),
                'allow_add'=> true,
                'allow_delete'=> true,
                'required'=>false,
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QuidditchBundle\Entity\Team'
        ));
    }
}
