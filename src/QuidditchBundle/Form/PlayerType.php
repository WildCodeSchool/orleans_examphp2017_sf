<?php

namespace QuidditchBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlayerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,array(
                    'label'=>'Nom',
            ))
            ->add('xp',TextType::class,array(
                    'label'=>'Point expérience',
            ))
            ->add('age',TextType::class,array(
                    'label'=>'Age',
            ))
            ->add('tiredness',TextType::class,array(
                    'label'=>'Niveau de fatigue',
            ))
            ->add('role',ChoiceType::class,array(
                    'label'=>'Role',
                    'choices'=>array('Gardien'=>'Gardien',
                                    'Attrapeur' => 'Attrapeur',
                                    'Batteur' => 'Batteur',
                                    'Poursuiveur' => 'Poursuiveur',)

            ))
            ->add('avatar',FileType::class,array(
                    'label'=>'Photo',
                    'required'=>true,
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QuidditchBundle\Entity\Player'
//            'data_class' => NULL
        ));
    }
}
