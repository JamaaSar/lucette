<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Service;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;




class CategoriesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $option)
    {
        
        $builder
            ->add('category', TextType::class, array(
            'label' => "Category",
        ))
        ->add('needCar', ChoiceType::class, [
            'label' => "Is this service need a car ?",
            'choices'  => [
                'Yes' => true,
                'No' => false,
        ]])
        ->add('image', FileType::class, [
            'label' => 'Image',
            'required' => false,
            'data_class' => null,
        ])
            ->add('service', EntityType::class, array(
                'class' => Service::class,
                'label' => "Service",
                'choice_label' => 'service'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Categories::class,
        ]);
    }

    
}
