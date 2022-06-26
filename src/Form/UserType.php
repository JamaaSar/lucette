<?php


namespace App\Form;

use App\Entity\MooveeUsers;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class UserType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options){



        $builder
            ->add('firstName', TextType::class, [
                'label' => 'FirstName',

            ])
            ->add('lastName', TextType::class, [
                'label' => 'LastName',

            ])
            ->add('email', EmailType::class, [
                'label' => 'Email'
            ])
            ->add('phoneNumber', TextType::class, [
                'label' => 'Phone Number'
            ])
            ->add('number_and_street', TextType::class, [
                'label' => 'Number and Street',
                'required' => false,
            ])
            ->add('zip_code', TextType::class, [
                'label' => 'ZIP',
                'required' => false,
            ])
            ->add('city', TextType::class, [
                'label' => 'City',
                'required' => false,
            ])
            ->add('code_company', TextType::class, [
                'label' => 'Company Code',
                'required' => false,
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