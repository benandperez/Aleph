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
use App\Entity\FamilyNucleus;
use App\Entity\Gender;
use App\Entity\LicenseType;
use App\Entity\MaritalStatus;
use App\Entity\PlaceWork;
use App\Entity\Province;
use App\Entity\WorkingInformation;
use App\Repository\LaborInformationAlephGroupRepository;
use App\Util\DateTimeTransformer;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;

class EmployeesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            //Perfil
            ->add('imageProfile', FileType::class, [
                'label' => false,
                // unmapped means that this field is not associated to any entity property
                'mapped' => false,
                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,
                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])
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
//            ->add('marriedLastName', null, [
//                'required' => false,
//                'label' => 'Apellido de casada: ',
//                'attr' => [
//                    'autocomplete' => 'off',
//                    'placeholder' => 'Apellido de casada',
//                    'class' => 'form-control'
//                ],
//            ])
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
                'format' => 'yyyy-MM-dd',
                'attr' => [
                    'class' => 'form-control datetimepicker'
                ],
            ])
            ->add('birthDay', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'label' => 'Fecha de nacimiento: ',
                'input_format' => 'Y-m-d',
                'format' => 'yyyy-MM-dd',
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
                'format' => 'yyyy-MM-dd',
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
                    'placeholder' => 'Sí su respuesta es SÍ detallar',
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
                    'placeholder' => 'Sí su respuesta es SÍ detallar',
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
            ->add('financialProfile', CollectionType::class, [
                'entry_type' => FinancialProfileType::class,
                'by_reference' => false,
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype'    => true,
                'required'     => false,
                'delete_empty' => true,
                'attr' => array(
                    'class' => 'financialProfile-collection',
                ),
                'entry_options' => [
                    'label' => false,
                ],
            ])

            //Información Laboral ALEPH GROUP
            ->add('laborInformationAlephGroup', CollectionType::class, [
                'entry_type' => LaborInformationAlephGroupType::class,
                'by_reference' => false,
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype'    => true,
                'required'     => false,
                'delete_empty' => true,
                'attr' => array(
                    'class' => 'laborInformationAlephGroup-collection',
                ),
                'entry_options' => [
                    'label' => false,
                ],
            ])

            //Información Académica
            ->add('studiesCurrently', CollectionType::class, [
                'entry_type' => StudiesCurrentlyType::class,
                'by_reference' => false,
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype'    => true,
                'required'     => false,
                'delete_empty' => true,
                'attr' => array(
                    'class' => 'studiesCurrently-collection',
                ),
                'entry_options' => [
                    'label' => false,
                ],
            ])
            ->add('educationLevel', CollectionType::class, [
                'entry_type' => EducationLevelType::class,
                'by_reference' => false,
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype'    => true,
                'required'     => false,
                'delete_empty' => true,
                'attr' => array(
                    'class' => 'educationLevel-collection',
                ),
                'entry_options' => [
                    'label' => false,
                ],
            ])
            ->add('language', CollectionType::class, [
                'entry_type' => LanguageType::class,
                'by_reference' => false,
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype'    => true,
                'required'     => false,
                'delete_empty' => true,
                'attr' => array(
                    'class' => 'language-collection',
                ),
                'entry_options' => [
                    'label' => false,
                ],
            ])

            //INFORMACIÓN PATRIMONIAL
            ->add('property', CollectionType::class, [
                'entry_type' => PropertyType::class,
                'by_reference' => false,
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype'    => true,
                'required'     => false,
                'delete_empty' => true,
                'attr' => array(
                    'class' => 'property-collection',
                ),
                'entry_options' => [
                    'label' => false,
                ],
            ])
            ->add('vehicleFeatures', CollectionType::class, [
                'entry_type' => VehicleFeaturesType::class,
                'by_reference' => false,
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype'    => true,
                'required'     => false,
                'delete_empty' => true,
                'attr' => array(
                    'class' => 'vehicleFeatures-collection',
                ),
                'entry_options' => [
                    'label' => false,
                ],
            ])

            //Referencias personales
            ->add('personalReferences', CollectionType::class, [
                'entry_type' => PersonalReferencesType::class,
                'by_reference' => false,
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype'    => true,
                'required'     => false,
                'delete_empty' => true,
                'attr' => array(
                    'class' => 'reference-collection',
                ),
                'entry_options' => [
                    'label' => false,
                ],
            ])

            //Información de Nucleo Familiar
            ->add('familyNucleus', CollectionType::class, [
                'entry_type' => FamilyNucleusType::class,
                'by_reference' => false,
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype'    => true,
                'required'     => false,
                'delete_empty' => true,
                'attr' => array(
                    'class' => 'familyNucleus-collection',
                ),
                'entry_options' => [
                    'label' => false,
                ],
            ])

            //Experience
            ->add('workingInformation', CollectionType::class, [
                'entry_type' => WorkingInformationType::class,
                'by_reference' => false,
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype'    => true,
                'required'     => false,
                'delete_empty' => true,
                'attr' => array(
                    'class' => 'workingInformation-collection',
                ),
                'entry_options' => [
                    'label' => false,
                ],
            ])

            //Document

            ->add('documentAll', FileType::class, [
                'label' => false,
                // unmapped means that this field is not associated to any entity property
                'mapped' => false,
                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,
                'multiple' => true,
                'attr' => array(
                    'class' => 'custom-file-label',
                ),
                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])
            ->add('documentBannsAll', FileType::class, [
                'label' => false,
                // unmapped means that this field is not associated to any entity property
                'mapped' => false,
                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,
                'multiple' => true,
                'attr' => array(
                    'class' => 'custom-file-label',
                ),
                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])
            
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employees::class,
            'intention'  => 'edit',
        ]);
    }
    public function getName()
    {
        return 'employees_edit';
    }
}
