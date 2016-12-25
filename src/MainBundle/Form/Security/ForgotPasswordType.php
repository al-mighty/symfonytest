<?php

namespace MainBundle\Form\Security;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;

class ForgotPasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('phone_number', TextType::class, [
                'label' => 'Номер телефона:',
                'constraints' => new NotBlank()
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Выслать новый пароль',
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ]);
    }
}
