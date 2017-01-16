<?php

namespace MainBundle\Form;

use MainBundle\Entity\Product;
use MainBundle\Entity\Storage;
use Doctrine\Common\Persistence\ObjectManager;
use MainBundle\Form\DataTransformer\EntityToNumberTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class CreateStorage
 * @package MainBundle\Form
 */
class AddProduct extends AbstractType
{

//    private $manager;
//
//    /**
//     * CreateStorage constructor.
//     * @param ObjectManager $manager
//     */
//    public function __construct(ObjectManager $manager)
//    {
//        $this->manager = $manager;
//    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $this->stock = $options['stock'];
//        $this->store = $options['store'];

        $builder
//            ->add('service', ChoiceType::class, [
//                'label' => 'Выберите услугу:',
//                'choices' => $this->services,
//                'constraints' => new NotBlank()
//            ])
//            ->add('temples', ChoiceType::class, [
//                'label' => 'Выберите один склад',
//                'expanded' => false,
//                'multiple' => true,
//                'choices' => $this->stock,
//                'constraints' => new NotBlank()
//            ])
//            ->add('temples', ChoiceType::class, [
//                'label' => 'Выберите один Магазин',
//                'expanded' => false,
//                'multiple' => true,
//                'choices' => $this->store,
//                'constraints' => new NotBlank()
//            ])
            ->add('nameProduct', TextType::class, [
                'label' =>
                    "Введите наименование продукта",
                'constraints' => new NotBlank()
            ])
            ->add('descProduct', TextType::class, [
                'label' => 'Описание продукта',
                'required' => false
            ])
//            ->add('countStore', TextType::class, [
//                'label' => 'только цифры',
//                'required' => false
//            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Добавить распределение',
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ]);

//        $builder->get('service')
//            ->addModelTransformer(new EntityToNumberTransformer($this->manager, Product::class));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([

        ]);
    }
}
