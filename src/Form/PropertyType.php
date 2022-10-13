<?php

namespace App\Form;

use App\Entity\Corregimiento;
use App\Entity\Property;
use App\Entity\PropertyStatus;
use App\Entity\Province;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('detailProperty', null, [
                'required' => true,
                'label' => 'Detalle el tipo de bien: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Detalle el tipo de bien',
                    'class' => 'form-control'
                ],
            ])
            ->add('distribution', null, [
                'required' => true,
                'label' => 'Distribución: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Distribución',
                    'class' => 'form-control'
                ],
            ])
            ->add('province', EntityType::class, [
                'class' => Province::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->andWhere('p.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('p.name', 'ASC');
                },
                'choice_label' => 'name',
                'label' => 'Provincia: ',
                'attr' => [
                    'class' => 'select',
                ],
            ])
            ->add('corregimiento', EntityType::class, [
                'class' => Corregimiento::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->andWhere('c.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('c.name', 'ASC');
                },
                'choice_label' => 'name',
                'label' => 'Corregimiento: ',
                'attr' => [
                    'class' => 'select',
                ],
            ])
            ->add('propertyStatus', EntityType::class, [
                'class' => PropertyStatus::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('ps')
                        ->andWhere('ps.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('ps.name', 'ASC');
                },
                'choice_label' => 'name',
                'label' => 'Estado: ',
                'attr' => [
                    'class' => 'select',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
        ]);
    }
}
