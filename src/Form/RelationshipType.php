<?php

namespace App\Form;

use App\Entity\Relationship;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RelationshipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'required' => true,
                'label' => 'Ocupación ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Ocupación',
                    'class' => 'form-control'
                ],
            ])
            ->add('status', ChoiceType::class, [
                'required' => true,
                'label' => 'Tiene algún familiar laborando en la empresa: ',
                'choices'  => [
                    'SÍ' => true,
                    'NO' => false,
                ],
                'expanded' => true,
                'attr' => [
                    'class' => 'form-check-input'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Relationship::class,
        ]);
    }
}
