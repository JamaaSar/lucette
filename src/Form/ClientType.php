<?php


namespace App\Form;

use App\Entity\MooveeUsers;
use App\Entity\Provider;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

use App\Repository\ProviderRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;



class ClientType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options){



        $builder
            ->add('first_name', TextType::class, [
                'label' => 'FirstName',

            ])
            ->add('last_name', TextType::class, [
                'label' => 'LastName',

            ])
            ->add('email', EmailType::class, [
                'label' => 'Email'
            ])
            ->add('phoneNumber', TextType::class, [
                'label' => 'Phone Number'
            ])
            ->add('codeCompany', TextType::class, [
                'label' => 'Company Code',
                'required' => false,
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
            ->add('provider', EntityType::class, [
                'label' => 'Provider',
                'class' => Provider::class,
                'query_builder' => function (ProviderRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where('u.supprime is Null')
                        ->orderBy('u.name', 'ASC');
                },
                'choice_label' => "name",
                'required' => false,
            ])
          
            ->add('role', ChoiceType::class, [
                'label' => 'Role',
                'choices' => [
                    'ROLE_USER' => 'ROLE_USER',
                    'ROLE_COMPANY_ADMIN' => 'ROLE_COMPANY_ADMIN',
                    'ROLE_WORKER' => 'ROLE_WORKER',
                    'ROLE_WORKER_ADMIN' => 'ROLE_WORKER_ADMIN',
                    'ROLE_ADMIN' => 'ROLE_ADMIN',
                ],
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