<?php

namespace App\Form;

use App\Entity\PlannedCleaning;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;

class PlannedCleaningType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class, [
                'label' => 'Date',
                'widget' => 'single_text',
            ])
            ->add('from', TimeType::class, [
                'label' => 'From',
                'widget' => 'single_text',
            ])  
            ->add('to',
            TimeType::class,
                [
                    'label' => 'To',
                    'widget' => 'single_text',
                ])
            ->add(
                'message',
                TypeTextType::class,
                [
                    'label' => 'Message to client',
                ]
            );
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PlannedCleaning::class,
        ]);
    }
}
