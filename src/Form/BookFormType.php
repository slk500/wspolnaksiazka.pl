<?php


namespace App\Form;


use App\Entity\Library;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class BookFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Proszę wpisać tytuł książki',
                    ])]
            ])
            ->add('author', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Proszę wpisać imię i nazwisko autora',
                    ])]
            ])
            ->add('year', TextType::class)
            ->add('info', TextType::class)

            ->add('library', EntityType::class, [
                'class' => Library::class
            ])
        ;
    }
}