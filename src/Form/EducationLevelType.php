<?php

namespace App\Form;

use App\Entity\EducationLevel;
use App\Entity\PlaceWork;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EducationLevelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('institution', null, [
                'required' => true,
                'label' => 'Institución: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Institución',
                    'class' => 'form-control'
                ],
            ])

            ->add('title', null, [
                'required' => true,
                'label' => 'Título en curso: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Título en curso',
                    'class' => 'form-control'
                ],
            ])
            ->add('educationLevelType', EntityType::class, [
                'class' => \App\Entity\EducationLevelType::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('el')
                        ->andWhere('el.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('el.name', 'ASC');
                },
                'choice_label' => 'name',
                'label' => 'Nivel: ',
                'attr' => [
                    'class' => 'select'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EducationLevel::class,
        ]);
    }
}
