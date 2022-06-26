<?php

namespace App\Form;

use App\Entity\MooveeCompany;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,[
                'label' => 'Name',
            ])
            ->add('address', TextType::class,[
                'label' => 'Address',
            ])
            ->add('phoneNumber', TextType::class,[
                'label' => 'Phone Number',
            ])
            ->add('codeEntreprise', TextType::class,[
                'label' => 'Code',
            ])
            ->add('contactEntreprise', TextType::class,[
                'label' => 'Contact',
            ])
            ->add('contactMailEntreprise', EmailType::class,[
                'label' => 'Email',
            ])
            ->add('image', FileType::class,[
                'label' => 'Logo',
                'required' => false,
                'data_class' => null,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MooveeCompany::class,
        ]);
    }
}
