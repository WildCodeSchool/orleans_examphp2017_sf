<?php

namespace QuidditchBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use QuidditchBundle\Entity\Joueur;
use QuidditchBundle\Entity\Equipe;

class RechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('equipe', EntityType::class, [
                'class' => 'QuidditchBundle\Entity\Joueur',
                'choice_label' => 'equipe',
            ])
//            ->add ('equipe', EntityType::class, [
//                'class' => 'QuidditchBundle\Entity\Equipe',
//            'choice_label' => 'nom',
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
           'data_class' => null,
        ));
    }

    public function getName()
    {
        return 'quidditch_bundle_recherche_type';
    }
}
