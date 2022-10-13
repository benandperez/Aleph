<?php

namespace App\Form;

use App\Entity\VehicleFeatures;
use App\Entity\VehicleTypes;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehicleFeaturesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('vehicleTypes', EntityType::class, [
                'class' => VehicleTypes::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('vt')
                        ->andWhere('vt.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('vt.name', 'ASC');
                },
                'choice_label' => 'name',
                'label' => 'Tipo de vehículo: ',
                'attr' => [
                    'class' => 'select',
                ],
            ])
            ->add('plateNumber', null, [
                'required' => true,
                'label' => 'Número de placa: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Número de placa',
                    'class' => 'form-control'
                ],
            ])
            ->add('model', null, [
                'required' => true,
                'label' => 'Modelo: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Modelo',
                    'class' => 'form-control'
                ],
            ])
            ->add('yearProduction', null, [
                'required' => true,
                'label' => 'Año de fabricación: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Año de fabricación',
                    'class' => 'form-control'
                ],
            ])
            ->add('mark', null, [
                'required' => true,
                'label' => 'Marca: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Marca',
                    'class' => 'form-control'
                ],
            ])
            ->add('description', null, [
                'required' => true,
                'label' => 'Descripción: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Descripción',
                    'class' => 'form-control'
                ],
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => VehicleFeatures::class,
        ]);
    }
}
