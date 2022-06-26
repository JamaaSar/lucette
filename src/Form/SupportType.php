<?php


namespace App\Form;

use App\Entity\MooveeUsers;
use App\Entity\Provider;
use App\Repository\ProviderRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class SupportType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options){



        $builder
            ->add('object', ChoiceType::class, [
                'label' => 'Object',
                'choices' => [
                    'General Information' => 'General Information',
                    'Booking Modification' => 'Booking Modification',
                    'Booking Cancellation' => 'Booking Cancellation',
                    'Feedback following a service' => 'Feedback following a service',
                    'Other' => 'Other',
                ],
                'mapped' => false,
            ])
            ->add('service', ChoiceType::class, [
                'label' => 'Service',
                'choices' => [
                    'Cleaning' => 'Cleaning',
                    'Technical control' => 'Technical control',
                    'Tires replacement' => 'Tires replacement',
                ],
                'mapped' => false,
            ])
            ->add('Message', TextareaType::class,[
                'label' => 'Message',
                'mapped' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MooveeUsers::class,
        ]);
    }
}