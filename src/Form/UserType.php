<?php

namespace App\Form;

use App\Entity\PlaceWork;
use App\Entity\Roles;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', null, [
                'required' => true,
                'label' => 'Nombres: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Nombres',
                    'class' => 'form-control'
                ],
            ])
            ->add('lastName', null, [
                'required' => true,
                'label' => 'Apellidos: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Apellidos',
                    'class' => 'form-control'
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
            ->add('roles', ChoiceType::class, [
                'required' => true,
                'multiple' => false,
                'expanded' => false,
                'choices'  => [
                    'ROLE_USER' => 'ROLE_USER',
                    'ROLE_PARTNER' => 'ROLE_PARTNER',
                    'ROLE_ADMIN' => 'ROLE_ADMIN',
                ],
                'attr' => [
                    'class' => 'select'
                ],
            ])
            ->add('password', null, [
                'required' => true,
                'label' => 'Password: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Password',
                    'class' => 'form-control'
                ],
            ])
//            ->add('imageProfile', null, [
//                'required' => true,
//                'label' => 'URL Imagen Perfil: ',
//                'attr' => [
//                    'autocomplete' => 'off',
//                    'placeholder' => 'URL Imagen Perfil',
//                    'class' => 'form-control'
//                ],
//            ])
//            ->add('userFolderName', null, [
//                'required' => true,
//                'label' => 'Carpeta: ',
//                'attr' => [
//                    'autocomplete' => 'off',
//                    'placeholder' => 'Carpeta',
//                    'class' => 'form-control'
//                ],
//            ])
            ->add('status')

            ->add('profileUser', FileType::class, [
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
//                        'mimeTypes' => [
//                            'application/pdf',
//                            'application/x-pdf',
//                        ],
//                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])
        ;

        // Data transformer
        $builder->get('roles')
            ->addModelTransformer(new CallbackTransformer(
                function ($rolesArray) {
                    // transform the array to a string
                    return count($rolesArray)? $rolesArray[0]: null;
                },
                function ($rolesString) {
                    // transform the string back to an array
                    return [$rolesString];
                }
            ));
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
