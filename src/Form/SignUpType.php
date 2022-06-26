<?php


namespace App\Form;

use App\Entity\MooveeUsers;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\IsTrue;

class SignUpType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options){



        $builder
            ->add('first_name', TextType::class,[
                'label' => 'First Name',
            ])
            ->add('last_name', TextType::class,[
                'label' => 'Last Name',
            ])
            ->add('email', EmailType::class,[
            'label' => 'Email',
            ])
            ->add('phoneNumber', TextType::class,[
                'label' => 'Phone Number',
            ])
            ->add('codeCompany', TextType::class,[
                'label' => 'Company Code',
                'required' => false,
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Confirm Password'),
            ])
            ->add('subscribe', CheckboxType::class, array(
               
                'required' => false,
                'data' => true
            ))

            ->add('termsAccepted', CheckboxType::class, array(
                'mapped' => false,
                'constraints' => new IsTrue(),
            ))

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MooveeUsers::class,
        ]);
    }
}