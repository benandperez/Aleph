<?php

namespace App\Form;

use App\Entity\Language;
use App\Entity\LanguageLevel;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LanguageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('language', null, [
                'required' => true,
                'label' => 'Idioma: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Idioma',
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
            ->add('certificate', ChoiceType::class, [
                'required' => true,
                'label' => '¿Cuenta con certificado?: ',
                'choices'  => [
                    'SÍ' => true,
                    'NO' => false,
                ],
                'expanded' => true,
                'attr' => [
                    'class' => 'form-check'
                ],
            ])
            ->add('languageLevel', EntityType::class, [
                'class' => LanguageLevel::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('ll')
                        ->andWhere('ll.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('ll.name', 'ASC');
                },
                'choice_label' => 'name',
                'label' => 'Hablado: ',
                'attr' => [
                    'class' => 'select'
                ],
            ])
            ->add('languageLevelWritten', EntityType::class, [
                'class' => LanguageLevel::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('ll')
                        ->andWhere('ll.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('ll.name', 'ASC');
                },
                'choice_label' => 'name',
                'label' => 'Escrito: ',
                'attr' => [
                    'class' => 'select'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Language::class,
        ]);
    }
}
