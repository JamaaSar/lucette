<?php

namespace App\Form;

use App\Entity\CategoryLocation;
use App\Entity\Categories;
use App\Entity\Parkings;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class CatLocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', EntityType::class, array(
            'class' => Categories::class,
            'label' => "Category",
            'choice_label' => 'category'
        ))


            ->add('parkingCat', EntityType::class, array(
            'class' => Parkings::class,
            'label' => "Parking",
            'choice_label' => 'name'
        ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CategoryLocation::class,
        ]);
    }
}
