<?php

namespace App\Form;

use App\Entity\DocumentType;
use App\Entity\FamilyNucleus;
use App\Entity\Gender;
use App\Entity\Relationship;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FamilyNucleusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', null, [
                'required' => true,
                'label' => 'Primer Nombre: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Primer Nombre',
                    'class' => 'form-control'
                ],
            ])
            ->add('lastName', null, [
                'required' => true,
                'label' => 'Apellido Paterno: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Apellido Paterno',
                    'class' => 'form-control'
                ],
            ])
            ->add('birthDay', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'label' => 'Fecha de nacimiento: ',
                'format' => 'yyyy-MM-dd',
                'attr' => [
                    'class' => 'form-control datetimepicker'
                ],
            ])
            ->add('age', null, [
                'required' => true,
                'label' => 'Edad: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'form-control'
                ],
            ])
            ->add('occupation', null, [
                'required' => true,
                'label' => 'Ocupación: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Ocupación',
                    'class' => 'form-control'
                ],
            ])
            ->add('firstNameSpouse', null, [
                'required' => true,
                'label' => 'Primer Nombre Esposo(a): ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Primer Nombre Esposo(a)',
                    'class' => 'form-control'
                ],
            ])
            ->add('secondNameSpouse', null, [
                'required' => true,
                'label' => 'Segundo Nombre Esposo(a): ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Segundo Nombre Esposo(a)',
                    'class' => 'form-control'
                ],
            ])
            ->add('lastNameSpouse', null, [
                'required' => true,
                'label' => 'Apellido Paterno Esposo(a): ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Apellido Paterno Esposo(a)',
                    'class' => 'form-control'
                ],
            ])
            ->add('motherLastNameSpouse', null, [
                'required' => true,
                'label' => 'Apellido Materno Esposo(a): ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Apellido Materno Esposo(a)',
                    'class' => 'form-control'
                ],
            ])
            ->add('marriedLastNameSpouse', null, [
                'required' => true,
                'label' => 'Apellido de casada:: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Apellido de casada:',
                    'class' => 'form-control'
                ],
            ])
            ->add('birthDaySpouse', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'label' => 'Fecha de nacimiento Esposo(a): ',
                'format' => 'yyyy-MM-dd',
                'attr' => [
                    'class' => 'form-control datetimepicker'
                ],
            ])
            ->add('ageSpouse', null, [
                'required' => true,
                'label' => 'Edad Esposo(a): ',
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'form-control'
                ],
            ])
            ->add('documentSpouse', null, [
                'required' => true,
                'label' => 'No. de Identificación Cédula o Pasaporte Esposo(a): ',
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'form-control'
                ],
            ])
            ->add('works', ChoiceType::class, [
                'required' => true,
                'label' => '¿Trabaja?: ',
                'choices'  => [
                    'SÍ' => true,
                    'NO' => false,
                ],
                'expanded' => true,
                'attr' => [
                    'class' => 'form-check-input'
                ],
            ])
            ->add('workPlace', null, [
                'required' => true,
                'label' => 'Lugar de Trabajo: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Lugar de Trabajo:',
                    'class' => 'form-control'
                ],
            ])
            ->add('jobPerforms', null, [
                'required' => true,
                'label' => 'Cargo que desempeña: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Cargo que desempeña:',
                    'class' => 'form-control'
                ],
            ])
            ->add('salary', null, [
                'required' => true,
                'label' => 'Salario: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Salario:',
                    'class' => 'form-control'
                ],
            ])
            ->add('timeSpouse', null, [
                'required' => true,
                'label' => 'Tiempo: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Tiempo:',
                    'class' => 'form-control'
                ],
            ])
            ->add('dependent', ChoiceType::class, [
                'required' => true,
                'label' => '¿Dependiente?: ',
                'choices'  => [
                    'SÍ' => true,
                    'NO' => false,
                ],
                'expanded' => true,
                'attr' => [
                    'class' => 'form-check-input'
                ],
            ])
            ->add('documentType', EntityType::class, [
                'class' => DocumentType::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('dt')
                        ->andWhere('dt.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('dt.name', 'ASC');
                },
                'choice_label' => 'name',
                'label' => 'Tipo de Documento: ',
                'attr' => [
                    'class' => 'select'
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
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FamilyNucleus::class,
        ]);
    }
}
