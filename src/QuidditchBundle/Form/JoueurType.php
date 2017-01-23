<?php

namespace QuidditchBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
            ->add('experience', IntegerType::class,[
                'data' => rand(20,80)
            ] )
            ->add('age', IntegerType::class,[
                'data' => rand(18,30)
            ] )

            ->add('photo', FileType::class, array(
                'label'=> 'Photo',
                'data_class'=>null,

                ))
            ->add('fatigue', IntegerType::class,[
                'data' => rand(0,20)
            ] )
            ->add('role', ChoiceType::class,[
                'choices' => [
                    'gardien' => 'gardien',
                    'batteur' => 'batteur',
                    'attrappeur' => 'attrappeur',
                    'poursuiveur' => 'poursuiveur'
                ]
            ])
            ->add('equipe', EntityType::class,[
                'class' => 'QuidditchBundle\Entity\Equipe',
                'choice_label'=>'nom',
                'label'=> ''
            ])

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
