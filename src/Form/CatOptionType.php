<?php


namespace App\Form;

use App\Entity\CategoryOption;
use App\Entity\MooveeUsers;
use App\Entity\Option;
use App\Entity\Products;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class CatOptionType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options){



        $builder



            ->add('category', TextType::class, array(
                'label' => "Category",


            ))
            ->add('price', TextType::class, array(
                'label' => "Price",


            ))

            ->add('time', TextType::class, array(
                'label' => "Time",


            ))


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CategoryOption::class,
        ]);
    }
}