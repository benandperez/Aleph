<?php

namespace App\Form;

use App\Entity\UnfulfilledGoals;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UnfulfilledGoalsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('unfulfilledGoals')
            ->add('reasonsForNonAchievement')
            ->add('employee')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UnfulfilledGoals::class,
        ]);
    }
}
