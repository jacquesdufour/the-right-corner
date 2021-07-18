<?php

namespace App\Form;

use App\Entity\Classifieds;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClassifiedsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('owner')
            ->add('title')
            ->add('category')
            ->add('publishedAt')
            ->add('text')
            ->add('picture')
            ->add('town')
            ->add('postcode')
            ->add('price')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Classifieds::class,
        ]);
    }
}
