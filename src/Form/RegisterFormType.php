<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class RegisterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label' => "Nom d'utilisateur",
                'required' => true,
                'constraints' => new NotBlank(),
                'constraints' => new NotNull(),
                'constraints' => new Length(['min' => 3, 'max' => 30]),
                'attr' => [
                    'placeholder' => "Nom d'utilisateur",
                ],
                'row_attr' => [
                    'class' => 'form-floating mb-3',
                ],
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'required' => true,
                'constraints' => new NotBlank(),
                'constraints' => new NotNull(),
                'constraints' => new Length(['min' => 3, 'max' => 30]),
                'attr' => [
                    'placeholder' => 'Prénom',
                ],
                'row_attr' => [
                    'class' => 'form-floating mb-3',
                ],
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'required' => true,
                'constraints' => new NotBlank(),
                'constraints' => new NotNull(),
                'constraints' => new Length(['min' => 3, 'max' => 30]),
                'attr' => [
                    'placeholder' => 'Nom',
                ],
                'row_attr' => [
                    'class' => 'form-floating mb-3',
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => true,
                'constraints' => new NotBlank(),
                'constraints' => new NotNull(),
                'constraints' => new Email(),
                'attr' => [
                    'placeholder' => 'Email',
                ],
                'row_attr' => [
                    'class' => 'form-floating mb-3',
                ],
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les deux mots de passe doivent être identique',
                'first_options' => [
                    'label' => 'Mot de passe',
                    'required' => true,
                    'constraints' => new NotBlank(),
                    'constraints' => new NotNull(),
                    'constraints' => new Length(['min' => 5]),
                    'attr' => [
                        'placeholder' => 'Mot de passe',
                    ],
                    'row_attr' => [
                        'class' => 'form-floating mb-3',
                    ],
                ],
                'second_options' => [
                    'label' => 'Confirmation du mot de passe',
                    'required' => true,
                    'constraints' => new NotBlank(),
                    'constraints' => new NotNull(),
                    'constraints' => new Length(['min' => 5]),
                    'attr' => [
                        'placeholder' => 'Confirmation du mot de passe',
                    ],
                    'row_attr' => [
                        'class' => 'form-floating mb-3',
                    ],
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire",
                'row_attr' => [
                    'class' => 'btn w-100',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
