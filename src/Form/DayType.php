<?php

namespace App\Form;

use App\Entity\Day;
use App\Entity\Dinner;
use App\Entity\Lunch;
use App\Repository\LunchRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class DayType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateOfService', DateType::class, [
                'widget' => 'single_text',
                'label' => "Date",
                'required' => true,
                'constraints' => new NotBlank(),
                'constraints' => new NotNull(),
                'constraints' => new Length(['min' => 3, 'max' => 30]),
                'attr' => [
                    'placeholder' => "Date",
                ],
            ])
            ->add('lunchOfTheDay', EntityType::class, [
                'class' => Lunch::class,
                'label' => "Déjeuner",
                'required' => true,
                'constraints' => new NotBlank(),
                'constraints' => new NotNull(),
                'constraints' => new Length(['min' => 3, 'max' => 30])
                ]
            )
            ->add('dinnerOfTheDay', EntityType::class, [
                'class' => Dinner::class,
                'label' => "Diner",
                'required' => true,
                'constraints' => new NotBlank(),
                'constraints' => new NotNull(),
                'constraints' => new Length(['min' => 3, 'max' => 30])
                ]
            )

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Day::class,
        ]);
    }
}
