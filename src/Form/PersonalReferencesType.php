<?php

namespace App\Form;

use App\Entity\Gender;
use App\Entity\PersonalReferences;
use App\Entity\Relationship;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonalReferencesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'required' => true,
                'label' => 'Nombres: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Nombres',
                    'class' => 'form-control'
                ],
            ])
            ->add('lastNames', null, [
                'required' => true,
                'label' => 'Apellidos ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Apellidos',
                    'class' => 'form-control'
                ],
            ])
            ->add('birthDay', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'label' => 'Fecha de nacimiento: ',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control datetimepicker'
                ],
            ])
            ->add('ocupation', null, [
                'required' => true,
                'label' => 'Ocupación ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Ocupación',
                    'class' => 'form-control'
                ],
            ])
            ->add('gender', EntityType::class, [
                'class' => Gender::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('g')
                        ->andWhere('g.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('g.name', 'ASC');
                },
                'choice_label' => 'name',
                'label' => 'Género: ',
                'attr' => [
                    'class' => 'select',
                    'placeholder' => 'Género',
                ],
            ])
            ->add('relationship', EntityType::class, [
                'class' => Relationship::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('r')
                        ->andWhere('r.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('r.name', 'ASC');
                },
                'choice_label' => 'name',
                'label' => 'Relación familiar: ',
                'attr' => [
                    'class' => 'select',
                    'placeholder' => 'Relación familiar',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PersonalReferences::class,
        ]);
    }
}
