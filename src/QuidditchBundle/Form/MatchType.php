<?php

namespace QuidditchBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MatchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('equipe1', EntityType::class, array(
                'class'=>'QuidditchBundle\Entity\Equipe',
                'choice_label'=>'nom',
                'label'=>'Equipe 1'
            ))
            ->add('equipe2', EntityType::class, array(
                'class'=>'QuidditchBundle\Entity\Equipe',
                'choice_label'=>'nom',
                'label'=> 'Equipe 2'
            ))
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QuidditchBundle\Entity\Joueur'
        ));
    }

    public function getName()
    {
        return 'quidditch_bundle_match_type';
    }
}
