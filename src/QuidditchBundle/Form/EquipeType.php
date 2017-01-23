<?php

namespace QuidditchBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EquipeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('pays')
//            ->add('joueurs', CollectionType::class, array('entry_type' => JoueurType::class,
//                                                            'allow_add' => true,
//                                                            'allow_delete' => true,
//                                                            'required' => false,
//                                                            'by_reference' => false))
            ->add('joueurs', EntityType::class, array('class' => 'QuidditchBundle:Joueur',
                'choice_label' => 'name',
                'label' => 'Quels joueurs la compose?',
                'expanded' => true,
                'multiple' => true,
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QuidditchBundle\Entity\Equipe'
        ));
    }
}
