<?php

namespace QuidditchBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $builder
             ->add('maRecherche', SearchType::class, [
                 'required'=>false
             ])
             ->add('age', EntityType::class, [
                 'class'=>'QuidditchBundle\Entity\Team',
                 'choice_label'=>'team'
             ])
             ->add('experience', EntityType::class, [
                 'class'=>'QuidditchBundle\Entity\Team',
                 'choice_label'=>'experience'
             ])
             ->add('fatigue', EntityType::class, [
                 'class'=>'QuidditchBundle\Entity\Team',
                 'choice_label'=>'fatigue'
             ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => null
        ));

    }

    public function getName()
    {
        return 'Quidditch_bundle_recherche_type';
    }
}
