<?php

namespace MainBundle\Form\Security;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login', TextType::class, [
                'label' => 'Номер телефона:',
                'attr'=> array('maxlength' => 10),
                'constraints' => new NotBlank()
            ])
            ->add('email', TextType::class, [
                'label' => 'Email:',
                'required' => false
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Пароли должны совпадать',
                'options' => [
                    'constraints' => new NotBlank()
                ],
                'first_options' => [
                    'label' => 'Пароль:'
                ],
                'second_options' => [
                    'label' => 'Подтвердите пароль:'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Зарегистрироваться',
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ]);
    }
}
