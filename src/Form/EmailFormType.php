<?php
namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class EmailFormType extends AbstractType 
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', TextType::class, array('label'=> 'Имя', 'attr' => array('class' => 'form-control', 'required' => 'required', 'placeholder' => 'Имя')))
       ->add('email', TextType::class, array('label'=> 'Email','attr' => array('class' => 'form-control', 'required' => 'required', 'placeholder' => 'E-Mail')))
       ->add('subject', TextType::class, array('label'=> 'Тема','attr' => array('class' => 'form-control', 'required' => 'required', 'placeholder' => 'Тема')))
       ->add('message', TextareaType::class, array('label'=> 'Сообщение','attr' => array('class' => 'form-control', 'rows' => '8', 'required' => 'required', 'placeholder' => 'Сообщение')))
        ;
    }
}