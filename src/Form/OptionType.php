<?php


namespace App\Form;

use App\Entity\CategoryOption;
use App\Entity\MooveeUsers;
use App\Entity\Option;
use App\Entity\Products;
use App\Repository\ProductsRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class OptionType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options){



        $builder
            ->add('name', TextType::class, array(
                'label' => "Name",


            ))
            ->add('description', TextareaType::class, array(
                'label' => "Description",


            ))
            ->add('commission', PercentType::class, array(
                'label' => "Commission",
                'scale' => 2,
                'type' => 'integer'

            ) )

            ->add('id_product', EntityType::class, array(
                'label' => "Product",
                'class' => Products::class,
                'query_builder' => function (ProductsRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->leftJoin('u.id_provider', 'p')
                        ->where('u.supprime is Null')
                        ->andWhere('p.supprime is Null')
                        ->orderBy('u.name', 'ASC');
                },
                'choice_label' => "name",



            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Option::class,
        ]);
    }
}