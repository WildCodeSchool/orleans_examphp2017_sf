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
            ->add('equipe1', EntityType::class, [
                'class'=> 'QuidditchBundle:Equipe',
                'choice_label' => 'nom'])
            ->add('equipe2', EntityType::class, [
                'class'=> 'QuidditchBundle:Equipe',
                'choice_label' => 'nom'])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => null
        ));
    }
}
