<?php

namespace QuidditchBundle\Form;

use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use QuidditchBundle\Entity\Team;

class PlayForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', EntityType::class,array(
                'class'=>'QuidditchBundle:Team',
                'choice_label'=> 'name',
                'expanded' => true,
                'multiple' => true,
                'required' => true,
                'label' => 'Choisissez deux équipes',
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => NULL
        ));
    }

    public function getName()
    {
        return 'quidditch_bundle_play_form';
    }
}
