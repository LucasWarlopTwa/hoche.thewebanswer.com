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
                'input'  => 'datetime',
                'label' => "Date",
                'required' => true,

            ])
            ->add('lunchOfTheDay',EntityType::class, [
                'label' => "Déjeuner",
                'required' => true,
                'class' => Lunch::class,
                'choice_label' => 'name',
            ])
            ->add('dinnerOfTheDay', EntityType::class, [
                'label' => "Diner",
                'required' => true,
                'class' => Dinner::class,
                'choice_label' => 'name',
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Day::class,
        ]);
    }
}
