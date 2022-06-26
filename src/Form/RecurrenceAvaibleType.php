<?php


namespace App\Form;

use App\Entity\Availability;
use App\Entity\Parkings;
use App\Entity\Provider;
use App\Repository\ParkingsRepository;
use App\Repository\ProviderRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class RecurrenceAvaibleType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {



        $builder
            ->add('parking', EntityType::class, [
                'label' => 'Parking',
                'class' => Parkings::class,
                'query_builder' => function (ParkingsRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.name', 'ASC');
                },
                'choice_label' => 'name',
            ])
            ->add('provider', EntityType::class, [
                'label' => 'Provider',
                'class' => Provider::class,
                'query_builder' => function (ProviderRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where('u.supprime is Null')
                        ->orderBy('u.name', 'ASC');
                },
                'choice_label' => 'name',
            ])
            ->add('from', TimeType::class, [
                'label' => 'From',
                'widget' => 'single_text',

            ])
            ->add('to', TimeType::class, [
                'label' => 'To',
                'widget' => 'single_text',
            ])
            ->add('date', DateType::class, [
                'label' => 'Date',
                'widget' => 'single_text',

            ])
            ->add('date', DateType::class, [
                'label' => 'End date',
                'widget' => 'single_text',

            ])
            ->add('rec', ChoiceType::class, [
                'label' => 'Role',
                'choices' => [
                    '1' => 'Monday',
                    '2' => 'Tuesday',
                    '3' => 'Wednesday',
                    '4' => 'Thursday',
                    '5' => 'Friday',
                    '6' => 'Saturday',
                    '7' => 'Sunday'
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Availability::class,
        ]);
    }
}
