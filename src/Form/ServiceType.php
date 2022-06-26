<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Service;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class ServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       


        $builder
            ->add('name', TextType::class, array(
                'label' => "Service",
            ));
           
       
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Service::class,
        ]);
    }
}
