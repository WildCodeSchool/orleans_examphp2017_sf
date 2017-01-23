<?php

namespace QuidditchBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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
            ->add('prenom')
            ->add('experience', IntegerType::class, array('attr' => array('min' => 20, 'max' => 80)))
            ->add('age', IntegerType::class, array('attr' => array('min' => 18, 'max' => 30)))
            ->add('fatique', \Symfony\Component\Form\Extension\Core\Type\IntegerType::class, array('attr' => array('min' => 0, 'max' => 20)))
            ->add('role', ChoiceType::class, array(
                'choices' => array(
                    '-- rôle du joueur --' => null,
                    'gardien'=> 'gardien',
                    'attrapeur'=> 'attrapeur',
                    'batteur'=> 'batteur',
                    'poursuiveur'=> 'poursuiveur',
                )
            ))
            ->add('equipe', EntityType::class, array('class' => 'QuidditchBundle:Equipe',
                    'choice_label' => 'nom',
                    'label' => 'A quelle équipe fait-il partie?',
                    'expanded' => true,
                    'multiple' => false,
                ))
//            ->add('equipe', CollectionType::class
//                , array('entry_type' => EquipeType::class,
//                'allow_add' => true,
//                'allow_delete' => true,
//                'required' => false,
//                'by_reference' => false))
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
