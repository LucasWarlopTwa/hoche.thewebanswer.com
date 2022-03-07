<?php

namespace App\Form;

use App\Entity\Lunch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LunchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('starters')
            ->add('desserts')
            ->add('dishes')
            ->add('accompagnements')
            ->add('laitiers')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lunch::class,
        ]);
    }
}
