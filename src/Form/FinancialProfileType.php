<?php

namespace App\Form;

use App\Entity\FinancialProfile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FinancialProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('accounts')
            ->add('name')
            ->add('creditBalance')
            ->add('creditCard')
            ->add('accountType')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FinancialProfile::class,
        ]);
    }
}
