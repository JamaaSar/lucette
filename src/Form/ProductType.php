<?php


namespace App\Form;

use App\Entity\Products;
use App\Entity\Provider;
use App\Entity\Categories;
use App\Repository\ProviderRepository;
use App\Repository\CategoriesRepository;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;




class ProductType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {



        $builder
            ->add('name', TextType::class, array(
                'label' => "Name",
            ))
            ->add('description', CKEditorType::class, array(
                'label' => "Description",
            ))
            ->add('commission', PercentType::class, array(
                'label' => "Commission",
                'scale' => 2,
                'type' => 'integer'
            ))
            ->add('id_provider', EntityType::class, array(
                'label' => "Provider",
                'class' => Provider::class,
                'query_builder' => function (ProviderRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where('u.supprime is Null')
                        ->orderBy('u.name', 'ASC');
                },
                'choice_label' => "name",
            ))
            ->add('category', EntityType::class, array(
                'label' => "Category",
                'class' => Categories::class,
                'query_builder' => function (CategoriesRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.category', 'ASC');
                },
                'choice_label' => "category",
            ))
            ->add('direct_buy', ChoiceType::class, [
                'label' => "Is this product a direct buy ?",
                'choices'  => [
                    'Yes' => true,
                    'No' => false,
                ]
            ])
            ->add('autoValide', ChoiceType::class, [
                'label' => "Is this product a auto valide ?",
                'choices'  => [
                    'Yes' => true,
                    'No' => false,
                ]
            ])
            ->add('image', FileType::class, [
                'label' => 'Image',
                'required' => false,
                'data_class' => null,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}
