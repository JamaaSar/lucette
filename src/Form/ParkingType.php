<?php


namespace App\Form;

use App\Entity\CategoryOption;
use App\Entity\MooveeCompany;
use App\Entity\MooveeUsers;
use App\Entity\Option;
use App\Entity\Parkings;
use App\Entity\Products;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class ParkingType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options){



        $builder
            ->add('name', TextType::class, array(
                'label' => "Name",


            ))
            ->add('address', TextType::class, array(
                'label' => "Address",


            ))
            ->add('zipCode', TextType::class, array(
                'label' => "Zip Code",


            ))
            ->add('city', TextType::class, array(
                'label' => "City",


            ))
            ->add('country', TextType::class, array(
                'label' => "Country",


            ))
            ->add('description', TextType::class, array(
                'label' => "Description",


            ))

            ->add('latitude', TextType::class, array(
                'label' => "Latitude",


            ))

            ->add('longitude', TextType::class, array(
                'label' => "Longitude",


            ))

            ->add('company', EntityType::class, array(
                'label' => "Company",
                'class' => MooveeCompany::class,
                'choice_label' => "name",
                'required' => false,



            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Parkings::class,
        ]);
    }
}