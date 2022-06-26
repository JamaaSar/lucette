<?php

namespace App\Form;

use App\Entity\MooveeCar;
use App\Entity\MooveeUserHasCar;
use App\Repository\MooveeUserHasCarRepository;
use App\Repository\MooveeCarRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\Loader\CallbackChoiceLoader;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserHasCarType extends AbstractType
{




    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user_has_car_nickname_car', TextType::class,[
                'label' => 'Plate Number',
            ])
            ->add('user_has_car_id_car', EntityType::class, array(
              'label' => "Brand / Model",
              'class' => MooveeCar::class,
                'choice_label' => "model_car",
                'group_by' => 'brand_car',
                'placeholder' => 'Choose a car model',

            ))
            ->add('space_number', TextType::class,[
                'label' => 'Parking Space Number',
                'required' => false,
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MooveeUserHasCar::class,
        ]);
    }
}
