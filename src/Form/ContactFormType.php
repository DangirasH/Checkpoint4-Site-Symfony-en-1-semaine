<?php

namespace App\Form;

use App\Entity\ContactForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => '<i class="bi bi-person my-2"></i>',
                'label_html' => true,
                'attr' =>
                ['placeholder' => 'Prénom']

            ])
            ->add('lastName', TextType::class, [
                'label' => '<i class="bi bi-person"></i>',
                'label_html' => true,
                'attr' =>
                ['placeholder' => 'Nom']
            ])
            ->add('phone', TelType::class, [
                'label' => '<i class="bi bi-telephone my-5"></i>',
                'label_html' => true,
                'attr' =>
                ['placeholder' => 'Téléphone']
            ])
            ->add('email', EmailType::class, [
                'label' => '<i class="bi bi-envelope"></i>',
                'label_html' => true,
                'attr' =>
                ['placeholder' => 'Email']
            ])
            ->add('message', TextareaType::class, [
                'label' => '<i class="bi bi-pen"></i>',
                'label_html' => true,
                'attr' =>
                ['placeholder' => 'Message']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactForm::class,
        ]);
    }
}
