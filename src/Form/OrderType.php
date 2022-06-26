<?php


namespace App\Form;

use App\Entity\CategoryOption;
use App\Entity\MooveeUserHasCar;
use App\Entity\MooveeUsers;
use App\Entity\Option;
use App\Entity\PlannedCleaning;
use App\Entity\Products;
use App\Repository\MooveeCarRepository;
use App\Repository\MooveeUserHasCarRepository;

use App\Repository\OptionRepository;
use App\Repository\ProductsRepository;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Security\Core\Security;


class OrderType extends AbstractType
{


    private $security;
    private $mooveeCarRepository;

    public function __construct(Security $security, MooveeCarRepository $mooveeCarRepository)
    {
        $this->security = $security;
        $this->mooveeCarRepository = $mooveeCarRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {



            $builder
                ->add('UserCarId', EntityType::class, array(
                'label' => "Select a car to clean",
                'class' => MooveeUserHasCar::class,
                'query_builder' => function (MooveeUserHasCarRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where('u.user_has_car_id_user = :user')
                        ->setParameter('user', $this->security->getUser());
                },
                'choice_label' =>   function (MooveeUserHasCar $car) {
                    return $car->getUserHasCarNicknameCar() . ': ' . $car->getUserHasCarIdCar()->getBrandCar() . ' ' . $car->getUserHasCarIdCar()->getModelCar();
                },
                    'placeholder' => 'Choose a car to clean',

                ));

            $builder->get('UserCarId')->addEventListener(

                FormEvents::POST_SUBMIT,
                function (FormEvent $event)
                {

                    $form = $event->getForm();
                    $cat = $form->getData()->getUserHasCarIdCar()->getCategoryCar();

                    //$this->addProductField($form->getParent(), $cat);
                    //dump($form);

                    $form->add('produit',EntityType::class,[
                            'class' => Products::class,
                            'placeholder' => "Choose a product",
                            'query_builder' => function (ProductsRepository $er) use ($cat) {
                                return $er->createQueryBuilder('u')
                                    ->leftJoin('u.categoryProducts', 'c')
                                    ->leftJoin('u.id_provider', 'p')
                                    ->where('c.category = :cat')

                                    ->setParameter('cat', $cat);
                            },
                            'choice_label' =>  'name',
                        ]

                    );



                }
            );
        $builder->addEventListener(
            FormEvents::POST_SET_DATA,
            function (FormEvent $event) {
                $form = $event->getForm();
                $data = $event->getData();

                $produit = $data->getProduit();
                if($produit){
                    $form->get('UserCarId')->setData($data->getUserHasCarIdCar());
                    $cat = $form->getData()->getUserHasCarIdCar()->getCategoryCar();
                    $form->add('produit',EntityType::class,[
                            'class' => Products::class,
                            'placeholder' => "Choose a product",
                            'query_builder' => function (ProductsRepository $er) use ($cat) {
                                return $er->createQueryBuilder('u')
                                    ->leftJoin('u.categoryProducts', 'c')
                                    ->leftJoin('u.id_provider', 'p')
                                    ->where('c.category = :cat')

                                    ->setParameter('cat', $cat);
                            },
                            'choice_label' =>  'name',
                        ]
                    );

                }else{
                        $form->add('produit',EntityType::class,[
                            'class' => Products::class,
                            'placeholder' => "Choose a product",
                            'choices' => [],
                        ]
                    );
                }
            }
        );

        }

    private function addProductField(FormInterface $form, ?string $cat)
    {
        /*
        $builder->addEventListener(
            FormEvent::POST_SUBMIT,
            function(FormEvent $event){
                dump($event->getForm()) ;
            }
        );*/
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PlannedCleaning::class,
        ]);
    }
}