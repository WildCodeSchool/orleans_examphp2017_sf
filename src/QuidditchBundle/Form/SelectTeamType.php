<?php

namespace QuidditchBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SelectTeamType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('equipe1', EntityType::class, ['class' => 'QuidditchBundle\Entity\Equipe', 'choice_label' => 'nom', 'data_class' => null, 'mapped' => false])
            ->add('equipe2', EntityType::class, ['class' => 'QuidditchBundle\Entity\Equipe', 'choice_label' => 'nom', 'data_class' => null, 'mapped' => false]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QuidditchBundle\Entity\Equipe'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'quidditchbundle_select_team';
    }


}