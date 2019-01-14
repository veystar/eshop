<?php

namespace App\Form;

use App\Entity\Orders;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, array(
        'required'   => true, 'label' => 'Имя'))
            ->add('lastName',TextType::class, array(
        'required'   => true, 'label' => 'Фамилия'))
            ->add('phone', TextType::class, array(
                'required'   => false, 'label' => 'Контактный телефон'))
            ->add('email',EmailType::class, array(
        'required'   => true, 'label' => 'Email'))
        #->add('createdAt',DateType::class, array(
         #   'required'   => false, 'label' => 'Заказ создан:'))
         ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Orders::class,
        ]);
    }
}
