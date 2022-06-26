<?php

namespace App\Form;

use App\Entity\MooveeCar;
use App\Entity\MooveeCompany;
use App\Entity\PhotosParking;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhotoParkingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image', FileType::class,[
                'mapped' => false,
                'label' => 'Please upload a file',
                'multiple' => true,
                'data_class' => null,
                'attr'     => [
                    'accept' => 'image/*',
                    'multiple' => 'multiple'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PhotosParking::class,
        ]);
    }


}
