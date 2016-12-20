<?php

namespace BlogBundle\Form;

use BlogBundle\Entity\PersonalData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PersonalDataType
 * @package BlogBundle
 */
class PersonalDataType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('last_name', TextType::class, [
                'label' => 'Фамилия:',
                'constraints' => new NotBlank()
            ])
            ->add('first_name', TextType::class, [
                'label' => 'Имя:',
                'constraints' => new NotBlank()
            ])
            ->add('middle_name', TextType::class, [
                'label' => 'Отчество:',
                'required' => false
            ])
            ->add('phone_number', TextType::class, [
                'label' => 'Номер телефона:',
                'constraints' => new NotBlank()
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Сохранить',
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => PersonalData::class,
        ));
    }
}
