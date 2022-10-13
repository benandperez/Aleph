<?php

namespace App\Form;

use App\Entity\WorkingInformation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WorkingInformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('since', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'label' => 'DESDE: ',
                'input_format' => 'Y-m-d',
                'format' => 'yyyy-MM-dd',
                'attr' => [
                    'class' => 'form-control datetimepicker'
                ],
            ])
            ->add('until', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'label' => 'HASTA: ',
                'input_format' => 'Y-m-d',
                'format' => 'yyyy-MM-dd',
                'attr' => [
                    'class' => 'form-control datetimepicker'
                ],
            ])
            ->add('business', null, [
                'required' => true,
                'label' => 'Organización/Empresa: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Organización/Empresa',
                    'class' => 'form-control'
                ],
            ])
            ->add('positionHeld', null, [
                'required' => true,
                'label' => 'Cargo desempeñado: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Cargo desempeñado',
                    'class' => 'form-control'
                ],
            ])
            ->add('directBoss', null, [
                'required' => true,
                'label' => 'Jefe directo: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Jefe directo',
                    'class' => 'form-control'
                ],
            ])
            ->add('referencePhone', null, [
                'required' => true,
                'label' => 'Teléfono de referencia: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Teléfono de referencia',
                    'class' => 'form-control'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => WorkingInformation::class,
        ]);
    }
}
