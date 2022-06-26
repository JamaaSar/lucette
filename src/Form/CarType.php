<?php

namespace App\Form;

use App\Entity\MooveeCar;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('brand_car')
            ->add('model_car')
            ->add('is_deleted')
            ->add('category_car')
            ->add('MooveeUser')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MooveeCar::class,
        ]);
    }
}
