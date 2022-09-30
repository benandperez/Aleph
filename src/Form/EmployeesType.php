<?php

namespace App\Form;

use App\Entity\Bank;
use App\Entity\BloodType;
use App\Entity\CompanyDepartment;
use App\Entity\Corregimiento;
use App\Entity\District;
use App\Entity\DocumentType;
use App\Entity\Employees;
use App\Entity\EmployeeType;
use App\Entity\Gender;
use App\Entity\LicenseType;
use App\Entity\MaritalStatus;
use App\Entity\PlaceWork;
use App\Entity\Province;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //Perfil
            ->add('firstName', null, [
                'required' => true,
                'label' => 'Primer Nombre: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Primer Nombre',
                    'class' => 'form-control'
                ],
            ])
            ->add('secondName', null, [
                'required' => true,
                'label' => 'Segundo Nombre: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Segundo Nombre: ',
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
            ->add('motherLastName', null, [
                'required' => true,
                'label' => 'Apellido Materno: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Apellido Materno',
                    'class' => 'form-control'
                ],
            ])
            ->add('marriedLastName', null, [
                'required' => true,
                'label' => 'Apellido de casada: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Apellido de casada',
                    'class' => 'form-control'
                ],
            ])
            ->add('nationality', null, [
                'required' => true,
                'label' => 'Nacionalidad: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Nacionalidad',
                    'class' => 'form-control'
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
            ->add('document', null, [
                'required' => true,
                'label' => 'No. de Identificación Cédula o Pasaporte: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'form-control'
                ],
            ])
            ->add('expirationDate', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'label' => 'Fecha de expiración: ',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control datetimepicker'
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

            ->add('cellPhone', null, [
                'required' => true,
                'label' => 'Teléfono Celular: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Teléfono Celular',
                    'class' => 'form-control'
                ],
            ])
            ->add('personalEmail', EmailType::class, [
                'required' => true,
                'label' => 'E-mail Personal: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'E-mail Personal',
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
            ->add('age', null, [
                'required' => true,
                'label' => 'Edad: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'form-control'
                ],
            ])

            //Personal Information
            ->add('birthPlace', null, [
                'required' => true,
                'label' => 'Lugar de nacimiento:  ',
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'form-control'
                ],
            ])
            ->add('fullResidenceAddress', null, [
                'required' => true,
                'label' => 'Dirección de residencia: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'form-control'
                ],
            ])
            ->add('maritalStatus', EntityType::class, [
                'class' => MaritalStatus::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('mt')
                        ->andWhere('mt.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('mt.name', 'ASC');
                },
                'choice_label' => 'name',
                'label' => 'Estado civil: ',
                'attr' => [
                    'class' => 'select',
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
            ->add('district', EntityType::class, [
                'class' => District::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('d')
                        ->andWhere('d.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('d.name', 'ASC');
                },
                'choice_label' => 'name',
                'label' => 'Distrito: ',
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
            ->add('residentialTelephone', null, [
                'required' => true,
                'label' => 'Teléfono residencial: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'form-control'
                ],
            ])
            ->add('sportsPractice', ChoiceType::class, [
                'required' => true,
                'label' => '¿Práctica deporte?: ',
                'choices'  => [
                    'SÍ' => true,
                    'NO' => false,
                ],
                'expanded' => true,
                'attr' => [
                    'class' => 'form-check-input'
                ],
            ])
            ->add('whatSports', null, [
                'required' => true,
                'label' => '¿Cuál?:',
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'form-control'
                ],
            ])
            ->add('favoriteHobby', null, [
                'required' => true,
                'label' => '¿Su Hobbie preferido es?:',
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'form-control'
                ],
            ])
            ->add('licenseType', EntityType::class, [
                'class' => LicenseType::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('lt')
                        ->andWhere('lt.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('lt.name', 'ASC');
                },
                'choice_label' => 'name',
                'label' => 'Tipo de Licencia de Conducir: ',
                'attr' => [
                    'class' => 'select',
                ],
            ])
            ->add('expirationDateLicense', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'required' => true,
                'label' => 'Fecha de expiración: ',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control datetimepicker'
                ],
            ])
            ->add('hasOwnCar', ChoiceType::class, [
                'required' => true,
                'label' => 'Tiene auto propio: ',
                'choices'  => [
                    'SÍ' => true,
                    'NO' => false,
                ],
                'expanded' => true,
                'attr' => [
                    'class' => 'form-check-input'
                ],
            ])

            // Emergency Contact
            ->add('inCaseOfEmergency', null, [
                'required' => true,
                'label' => 'En caso de emergencia llamar a: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'form-control'
                ],
            ])
            ->add('familyPhoneNumber', null, [
                'required' => true,
                'label' => 'No. de teléfono del familiar: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'form-control'
                ],
            ])
            ->add('allergic', ChoiceType::class, [
                'required' => true,
                'label' => '¿Es alérgico a algún medicamento o comida?: ',
                'choices'  => [
                    'SÍ' => true,
                    'NO' => false,
                ],
                'expanded' => true,
                'attr' => [
                    'class' => 'form-check-input'
                ],
            ])
            ->add('allergicYes', null, [
                'required' => true,
                'label' => false,
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'form-control'
                ],
            ])
            ->add('chronicDisease', ChoiceType::class, [
                'required' => true,
                'label' => '¿Padece de alguna enfermedad crónica?: ',
                'choices'  => [
                    'SÍ' => true,
                    'NO' => false,
                ],
                'expanded' => true,
                'attr' => [
                    'class' => 'form-check-input'
                ],
            ])
            ->add('chronicDiseaseYes', null, [
                'required' => true,
                'label' => false,
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'form-control'
                ],
            ])
            ->add('bloodType', EntityType::class, [
                'class' => BloodType::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('bt')
                        ->andWhere('bt.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('bt.name', 'ASC');
                },
                'choice_label' => 'name',
                'label' => 'Tipo de sangre: ',
                'attr' => [
                    'class' => 'select',
                ],
            ])
            ->add('bloodDonor', ChoiceType::class, [
                'required' => true,
                'label' => '¿Usted es donante de sangre?: ',
                'choices'  => [
                    'SÍ' => true,
                    'NO' => false,
                ],
                'expanded' => true,
                'attr' => [
                    'class' => 'form-check-input'
                ],
            ])

            //Bank information
            ->add('bank', EntityType::class, [
                'class' => Bank::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('b')
                        ->andWhere('b.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('b.name', 'ASC');
                },
                'choice_label' => 'name',
                'label' => 'Banco: ',
                'attr' => [
                    'class' => 'select',
                ],
            ])
            ->add('bankAccount', ChoiceType::class, [
                'required' => true,
                'label' => '¿Tiene cuenta bancaria de ahorro?: ',
                'choices'  => [
                    'SÍ' => true,
                    'NO' => false,
                ],
                'expanded' => true,
                'attr' => [
                    'class' => 'form-check-input'
                ],
            ])
            ->add('accountNumber', null, [
                'required' => true,
                'label' => 'No. de cuenta:',
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'form-control'
                ],
            ])

            //Información Laboral ALEPH GROUP
            ->add('companyPosition', null, [
                'required' => true,
                'label' => 'Cargo en la empresa:',
                'attr' => [
                    'autocomplete' => 'off',
                    'class' => 'form-control'
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
            ->add('dateJoiningCompany', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'required' => true,
                'label' => 'Fecha de ingreso a la empresa: ',
                'format' => 'dd-MM-yyyy',
                'attr' => [
                    'class' => 'form-control datetimepicker'
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
                    'data-placeholder' => 'choose roles',
                    'class' => 'select',
                ] ,
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
                    'class' => 'form-check-input'
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



            ->add('personalReferences', CollectionType::class, [
                'entry_type' => PersonalReferencesType::class,
                'by_reference' => false,
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype'    => true,
                'required'     => false,
                'delete_empty' => true,
                'attr' => array(
                    'class' => 'my-selector',
                ),
                'entry_options' => [
                    'label' => false,
                ],
            ])
            
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employees::class,
        ]);
    }
}
