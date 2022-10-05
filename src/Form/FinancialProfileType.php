<?php

namespace App\Form;

use App\Entity\AccountType;
use App\Entity\DocumentType;
use App\Entity\FinancialProfile;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FinancialProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('accounts', ChoiceType::class, [
                'required' => true,
                'label' => '¿Posee cuentas bancarias / cooperativas / financieras?: ',
                'choices'  => [
                    'SÍ' => true,
                    'NO' => false,
                ],
                'expanded' => true,
                'attr' => [
                    'class' => 'form-check-input'
                ],
            ])
            ->add('name', null, [
                'required' => true,
                'label' => 'Nombre de bancos / cooperativas / Financieras: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Nombre de bancos / cooperativas / Financieras',
                    'class' => 'form-control'
                ],
            ])
            ->add('creditBalance', null, [
                'required' => true,
                'label' => 'Saldo de crédito: ',
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Saldo de crédito',
                    'class' => 'form-control'
                ],
            ])
            ->add('creditCard', ChoiceType::class, [
                'required' => true,
                'label' => '¿Posee Tarjeta de crédito?: ',
                'choices'  => [
                    'SÍ' => true,
                    'NO' => false,
                ],
                'expanded' => true,
                'attr' => [
                    'class' => 'form-check-input'
                ],
            ])
            ->add('accountType', EntityType::class, [
                'class' => AccountType::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('at')
                        ->andWhere('at.status = :status')
                        ->setParameter('status', '1')
                        ->orderBy('at.name', 'ASC');
                },
                'choice_label' => 'name',
                'label' => 'Tipo de cuenta: ',
                'attr' => [
                    'class' => 'select'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FinancialProfile::class,
        ]);
    }
}
