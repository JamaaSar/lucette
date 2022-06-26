<?php


namespace App\Form;

use App\Entity\Availability;
use App\Entity\MooveeUsers;
use App\Entity\Parkings;
use App\Entity\PlannedCleaning;
use App\Entity\Provider;
use App\Repository\ProviderRepository;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class HorraireType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options){



        $builder
            ->add('from', TimeType::class, [
                'label' => 'From',
                'widget' => 'single_text',
                'mapped' => false,

            ])
            ->add('to',TimeType::class, [
                'label' => 'To',
                'widget' => 'single_text',
                'mapped' => false,
            ])
            ->add('date', DateType::class, [
                'label' => 'Date',
                'widget' => 'single_text',

            ])




        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PlannedCleaning::class,
        ]);
    }
}