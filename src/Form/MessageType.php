<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Validator\Constraints\NotBlank;


class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('Name', TextType::class, [
            'attr' => array(
                'class' => 'bg-transparent block border-b-2 w-full h-20 text-6xl outline-none',
                'placeholder' => 'Enter title...',
            ),
            'label' => false,
            'required' => false,
        ])
        ->add('Email', EmailType::class, [
            'attr' => array(
                'class' => 'bg-transparent block mt-10 border-b-2 w-full h-60 text-6xl outline-none',
                'placeholder' => 'Enter Email...'
            ),
            'label' => false,
            'required' => false,
        ])
            ->add('Text', TextareaType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block mt-10 border-b-2 w-full h-60 text-6xl outline-none',
                    'placeholder' => 'Enter the text...'
                ),
                'label' => false,
                'required' => false,
                'constraints' => [
                    new NotBlank(),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
