<?php

namespace App\Form;

use App\Entity\WorkingInformation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WorkingInformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('since')
            ->add('until')
            ->add('business')
            ->add('positionHeld')
            ->add('directBoss')
            ->add('referencePhone')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => WorkingInformation::class,
        ]);
    }
}
