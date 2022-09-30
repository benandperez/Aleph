<?php

namespace App\Form;

use App\Entity\FamilyNucleus;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FamilyNucleusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('birthDay')
            ->add('age')
            ->add('occupation')
            ->add('firstNameSpouse')
            ->add('secondNameSpouse')
            ->add('lastNameSpouse')
            ->add('motherLastNameSpouse')
            ->add('marriedLastNameSpouse')
            ->add('birthDaySpouse')
            ->add('ageSpouse')
            ->add('documentSpouse')
            ->add('works')
            ->add('workPlace')
            ->add('jobPerforms')
            ->add('salary')
            ->add('timeSpouse')
            ->add('dependent')
            ->add('documentType')
            ->add('gender')
            ->add('relationship')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FamilyNucleus::class,
        ]);
    }
}
