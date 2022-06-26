<?php


namespace App\Form;

use App\Entity\MooveeUsers;
use App\Entity\Provider;
use App\Entity\Reduction;
use App\Repository\ProviderRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class ReductionType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options){



        $builder
            ->add('code', TextType::class, [
                'label' => 'Code',

            ])
            ->add('reduction', NumberType::class, [
                'label' => 'Montant en €',

            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reduction::class,
        ]);
    }
}