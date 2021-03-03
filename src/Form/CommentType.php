<?php

namespace App\Form;

use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Firstname',TextType::class, [
                'label'=> "Nom",])
            ->add('Lastname',TextType::class, [
                'label'=> "Prénom",])
            ->add('email',EmailType::class, [
                'label'=> "Email",])
            ->add('Dateofbirth', DateType::class, [
                "label" => "Date de naissance",
                "widget" => "single_text"
            ])
            ->add('content',TextareaType::class, [
                'label'=> "Votre commentaire",])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
