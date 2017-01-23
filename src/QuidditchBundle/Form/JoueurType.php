<?php

namespace QuidditchBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


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
            ->add('exp')
            ->add('age')
//	        ->add('role', ChoiceType::class, array('choices' => array('gardien'=>'gardien', 'attrapeur'=>'attrapeur', 'batteur'=>'batteur', 'poursuiveur'=>'poursuiveur'),
//		        'choices_as_values'=>true))
//	        ->add('equipe', EntityType::class, [
//		        'class'=>'QuidditchBundle\Entity\Equipe',
//		        'choice_label'=>'equipe',
//	        ])
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
