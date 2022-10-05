<?php

namespace App\Form;

use App\Entity\StudiesCurrently;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudiesCurrentlyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('level', null, [
                'required' => true,
                'label' => 'Nivel Educativo: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Nivel Educativo',
                    'class' => 'form-control'
                ],
            ])
            ->add('institution', null, [
                'required' => true,
                'label' => 'Institución: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Institución',
                    'class' => 'form-control'
                ],
            ])
            ->add('title', null, [
                'required' => true,
                'label' => 'Título Obtenido: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Título Obtenido',
                    'class' => 'form-control'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StudiesCurrently::class,
        ]);
    }
}
