<?php

namespace App\Form;

use App\Entity\SelfAppraisal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SelfAppraisalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('achievedGoals', CollectionType::class, [
                'entry_type' => AchievedGoalsType::class,
                'by_reference' => false,
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype'    => true,
                'required'     => false,
                'delete_empty' => true,
                'attr' => array(
                    'class' => 'achievedGoals-collection',
                ),
                'entry_options' => [
                    'label' => false,
                ],
            ])

            ->add('unfulfilledGoals', CollectionType::class, [
                'entry_type' => UnfulfilledGoalsType::class,
                'by_reference' => false,
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype'    => true,
                'required'     => false,
                'delete_empty' => true,
                'attr' => array(
                    'class' => 'unfulfilledGoals-collection',
                ),
                'entry_options' => [
                    'label' => false,
                ],
            ])
            ->add('description', TextType::class,[])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SelfAppraisal::class,
        ]);
    }
}
