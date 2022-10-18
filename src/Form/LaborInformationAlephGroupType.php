<?php

namespace App\Form;

use App\Entity\CompanyDepartment;
use App\Entity\CompanyPosition;
use App\Entity\Employees;
use App\Entity\EmployeeType;
use App\Entity\LaborInformationAlephGroup;
use App\Entity\PlaceWork;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LaborInformationAlephGroupType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('companyPosition', EntityType::class, [
                'class' => CompanyPosition::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('cp')
                        ->andWhere('cp.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('cp.name', 'ASC');
                },
                'choice_label' => 'name',
                'label' => 'Cargo en la empresa: ',
                'attr' => [
                    'class' => 'select',
                ],
            ])

            ->add('employeeType', EntityType::class, [
                'class' => EmployeeType::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('et')
                        ->andWhere('et.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('et.name', 'ASC');
                },
                'choice_label' => 'name',
                'label' => 'Tipo de empleado: ',
                'attr' => [
                    'class' => 'select',
                ],
            ])
            ->add('companyDepartment', EntityType::class, [
                'class' => CompanyDepartment::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('cd')
                        ->andWhere('cd.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('cd.name', 'ASC');
                },
                'choice_label' => 'name',
                'label' => 'Departamento: ',
                'attr' => [
                    'class' => 'select',
                ],
            ])

            ->add('email', EmailType::class, [
                'required' => true,
                'label' => 'E-mail: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'E-mail',
                    'class' => 'form-control'
                ],
            ])
            ->add('placeWork', EntityType::class, [
                'class' => PlaceWork::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('b')
                        ->andWhere('b.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('b.name', 'ASC');
                },
                'choice_label' => 'name',
                'label' => 'Lugar donde desarrolla su trabajo: ',
                'placeholder' => 'Select',
                'multiple' => true ,
                'attr' => [
                    'data-placeholder' => 'choose Lugar de Trabajo',
                    'class' => 'select',
                ] ,
            ])
            ->add('dateJoiningCompany', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'required' => true,
                'label' => 'Fecha de ingreso a la empresa: ',
                'format' => 'yyyy-MM-dd',
                'attr' => [
                    'class' => 'form-control datetimepicker'
                ],
            ])
            ->add('dateEndCompany', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'required' => true,
                'label' => 'Fecha de finalizacion en la empresa: ',
                'format' => 'yyyy-MM-dd',
                'attr' => [
                    'class' => 'form-control datetimepicker'
                ],
            ])

            ->add('currentPosition', ChoiceType::class, [
                'required' => true,
                'label' => 'Cargos Actual: ',
                'choices'  => [
                    'SÍ' => true,
                    'NO' => false,
                ],
                'expanded' => true,
                'attr' => [
                    'class' => ''
                ],
            ])
            ->add('salary', null, [
                'required' => false,
                'label' => "Salario",
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'form-control'
                ],
            ])

            ->add('familyCompany', ChoiceType::class, [
                'required' => true,
                'label' => 'Tiene algún familiar laborando en la empresa: ',
                'choices'  => [
                    'SÍ' => true,
                    'NO' => false,
                ],
                'expanded' => true,
                'attr' => [
                    'class' => ''
                ],
            ])
            ->add('familyCompanyText', null, [
                'required' => true,
                'label' => false,
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'form-control'
                ],
            ])


            ->add('coordinator', EntityType::class, [
                'class' => Employees::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('e')
                        ->andWhere('e.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('e.firstName', 'ASC');
                },
                'choice_label' => function($employee, $key, $index) {
                    /** @var Employees $employee */
                    return $employee->getFirstName() . ' ' . $employee->getLastName();
                },
                'label' => 'Coordinador: ',
                'placeholder' => 'Select',
                'multiple' => true ,
                'attr' => [
                    'data-placeholder' => 'choose Lugar de Trabajo',
                    'class' => 'select',
                ] ,
            ])

            ->add('director', EntityType::class, [
                'class' => Employees::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('cd')
                        ->andWhere('cd.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('cd.firstName', 'ASC');
                },
                'choice_label' => function($employee, $key, $index) {
                    /** @var Employees $employee */
                    return $employee->getFirstName() . ' ' . $employee->getLastName();
                },
                'label' => 'Director: ',
                'attr' => [
                    'class' => 'select',
                ],
            ])
            ->add('executiveDirector', EntityType::class, [
                'class' => Employees::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('e')
                        ->andWhere('e.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('e.firstName', 'ASC');
                },
                'choice_label' => function($employee, $key, $index) {
                    /** @var Employees $employee */
                    return $employee->getFirstName() . ' ' . $employee->getLastName();
                },
                'label' => 'Director Ejecutivo: ',
                'attr' => [
                    'class' => 'select',
                ],
            ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LaborInformationAlephGroup::class,
        ]);
    }
}
