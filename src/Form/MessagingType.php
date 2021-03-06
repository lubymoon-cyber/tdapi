<?php

namespace App\Form;

use App\Entity\Messaging;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessagingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('state')
            ->add('archives')
            ->add('object')
            ->add('message')
            ->add('messageDate')
            ->add('mailUser')
            ->add('destinationUser')
            ->add('senderUser')
            ->add('mailUser', null, [
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
            'data_class' => Messaging::class,
        ]);
    }
}
