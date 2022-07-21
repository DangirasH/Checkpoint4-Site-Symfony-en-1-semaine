<?php

namespace App\Form;

use App\Entity\Recomendations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecomendationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('activity')
            ->add('address')
            ->add('date')
            ->add('description')
            ->add('image')
            ->add('country')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recomendations::class,
        ]);
    }
}
