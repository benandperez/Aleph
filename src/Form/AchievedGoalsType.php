<?php

namespace App\Form;

use App\Entity\AchievedGoals;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AchievedGoalsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('achievedGoals')
            ->add('reasonsAchievement')
            ->add('employee')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AchievedGoals::class,
        ]);
    }
}
