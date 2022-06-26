<?php


namespace App\Form;

use App\Entity\CategoryOption;
use App\Entity\MooveeUsers;
use App\Entity\Option;
use App\Entity\Products;
use App\Entity\Provider;
use Doctrine\Tests\Common\DataFixtures\TestEntity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class ProviderType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options){



        $builder
            ->add('name', TextType::class, array(
                'label' => "Name",


            ))
            ->add('address', TextType::class, array(
                'label' => "Address",


            ))
            ->add('address2', TextType::class, array(
                'label' => "Address 2",
                'required' => false,

            ))
            ->add('postal_code', TextType::class, array(
                'label' => "Postal Code",


            ))
            ->add('city', TextType::class, array(
                'label' => "City",


            ))
            ->add('country', TextType::class, array(
                'label' => "Country",


            ))
            ->add('tva', TextType::class, array(
                'label' => "Tva",


            ))

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Provider::class,
            'csrf_token_id' => 'login_form_csrf'
        ]);
    }
}