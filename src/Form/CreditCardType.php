<?php


namespace App\Form;

use App\Entity\CreditCard;
use App\Entity\MooveeUsers;
use App\Entity\Provider;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class CreditCardType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options){



        $builder
            ->add('monthValidity', TextType::class, [
                'label' => 'Month Validity',
            ])
            ->add('yearValidity', TextType::class, [
                'label' => 'Year Validity',

            ])
            ->add('lastDigits', TextType::class, [
                'label' => 'Number'
            ])
            ->add('Ccv', TextType::class, [
                'label' => 'Enter your Ccv (3 digit number on the back of your credit card)',
                'mapped' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CreditCard::class,
        ]);
    }
}