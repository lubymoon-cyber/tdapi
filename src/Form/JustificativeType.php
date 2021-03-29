<?php

namespace App\Form;

use App\Entity\Justificative;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JustificativeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('amount')
            ->add('createdDate')
            ->add('dateProduction')
            ->add('path')
            ->add('supportUser')
            ->add('lineChargesOutsideTheBundles')
            ->add('lineFeePackages')
            ->add('supportUser', null, [
                'class' => User::class,
                'choice_label' => 'lastName',
                'by_reference' =>true,
                'mapped' =>true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Justificative::class,
        ]);
    }
}
