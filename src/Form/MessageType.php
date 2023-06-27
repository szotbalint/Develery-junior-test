<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Validator\Constraints\NotBlank;


class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('Name', TextType::class, [
            'attr' => ['class' => 'form-control my-4', 'placeholder' => 'Adja meg nevét...'],
            'label' => false,
            'required' => false,
            'error_bubbling'=>false,
        ])
        ->add('Email', EmailType::class, [
            'attr' => ['class' => 'form-control my-4', 'placeholder' => 'Adja meg E-mail címét...'],
            'label' => false,
            'required' => false,
            'error_bubbling'=>false,
        ])
            ->add('Text', TextareaType::class, [
                'attr' => ['class' => 'form-control my-4', 'placeholder' => 'Üzenet szövege...'],
                'label' => false,
                'required' => false,
                'error_bubbling'=>false,
            ])
            ->add('Send', SubmitType::class, [
                'attr' => ['class' => 'btn btn-dark w-25 fw-bold my-3'],
                'label' => 'Küldés',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
