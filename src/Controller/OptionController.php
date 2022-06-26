<?php

namespace App\Controller;

use App\Entity\CategoryOption;
use App\Entity\Option;
use App\Form\CatOptionType;
use App\Form\OptionType;
use App\Entity\Products;
use App\Repository\CategoryOptionRepository;
use App\Repository\OptionRepository;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
/**
 * @Route("/option", name="option_")
 * 
 */
class OptionController extends AbstractController
{

    private  $categoryOptionRepository;
    private $optionRepository;
    private $productsRepository;

    public function __construct(CategoryOptionRepository $categoryOptionRepository,
                                OptionRepository $optionRepository,
                                ProductsRepository $productsRepository)
    {
        $this->categoryOptionRepository = $categoryOptionRepository;
        $this->optionRepository = $optionRepository;
        $this->productsRepository = $productsRepository;

    }


    /**
     * @Route("", name="list")
     */
    public function list()
    {
        $user = $this->getUser();
        $provider = $user->getProvider();

        if(!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render('option/list.html.twig', [
                'options' => $this->optionRepository->findOpbyCatProvider($provider)
            ]);
        } 
            return $this->render('option/list.html.twig', [
                'options' => $this->optionRepository->findBy(['supprime' => Null])
            ]);
    }


    /**
     * @Route("/detail/{id}", name="detail")
     */
    public function detail(int $id)
    {
        return $this->render('option/detail.html.twig',[
            'option' => $this->optionRepository->find($id)
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit(int $id, Request $request)
    {
       
        $em = $this->getDoctrine()->getManager();
        $currentoption = $this->optionRepository->findOneBy(['id' => $id]);
        $comm = $currentoption->getCommission();
        $product = $currentoption->getIdProduct();

        $form = $this->createForm(OptionType::class,$currentoption);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()){
            if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
                $currentoption->setCommission($comm);
                $currentoption->setIdProduct($product);
            } else {
                $comm = $form->getData()->getCommission();
                $comm = $comm / 100;
                $currentoption->setCommission($comm);
            }

            $this->addFlash('success', 'The option has been successfully edited!');


            $em->flush();


            return $this->redirectToRoute('option_list');
        }

        return $this->render('option/edit.html.twig',[
            'form' => $form->createView(),
            'comm' => $comm*100
        ]);
    }

    /**
     * @Route("/add", name="add")
     */
    public function add(Request $request)
    {
        $user = $this->getUser();
        $userProvider = $user->getProvider();

        $newoption = (new Option());
        $em = $this->getDoctrine()->getManager();
        
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {

            $form = $this->createFormBuilder($newoption)
                ->add('name', TextType::class, array(
                    'label' => "Name",
                ))
                ->add('description', TextareaType::class, array(
                    'label' => "Description",
                ))
                ->add('id_product', EntityType::class, array(
                    'label' => "Product",
                    'class' => Products::class,
                    'choices' => $this->productsRepository->findProductsByProvider($userProvider),
                    'choice_label' => "name",
                ))
            ->getForm();
        } else {
            $form = $this->createForm(OptionType::class, $newoption);
        }

        $form->handleRequest($request);
        
      
        if ($form->isSubmitted() && $form->isValid()){
            $product = $form->getData()->getIdProduct()->getCommission();
            if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
                $newoption->setCommission($product);
            } else {
                $commPercent = $form->getData()->getCommission();
                $comm = $commPercent / 100;
                $newoption->setCommission($comm);
            }


        /*

            if($form["timeA"]->getData() == Null && $form["priceA"]->getData() !== Null){
                $this->addFlash('danger', 'If you want to add a category please fill all fields! TA');
                return $this->redirectToRoute('option_add');
            }
            elseif ($form["timeA"]->getData() !== Null && $form["priceA"]->getData() == Null){
                $this->addFlash('danger', 'If you want to add a category please fill all fields! PA');
                return $this->redirectToRoute('option_add');
            }
            elseif ($form["timeA"]->getData() !== Null && $form["priceA"]->getData() !== Null){
                $catA = (new CategoryOption());
                $catA   ->setCategory("A")
                    ->setPrice($form["priceA"]->getData())
                    ->setTime($form["timeA"]->getData());
            }


            if($form["timeB"]->getData() == Null && $form["priceB"]->getData() !== Null){
                $this->addFlash('danger', 'If you want to add a category please fill all fields! TB');
                return $this->redirectToRoute('option_add');
            }
            elseif ($form["timeB"]->getData() !== Null && $form["priceB"]->getData() == Null){
                $this->addFlash('danger', 'If you want to add a category please fill all fields! PB');
                return $this->redirectToRoute('option_add');
            }
            elseif ($form["timeB"]->getData() !== Null && $form["priceB"]->getData() !== Null){
                $catB = (new CategoryOption());
                $catB   ->setCategory("B")
                        ->setPrice($form["priceB"]->getData())
                        ->setTime($form["timeB"]->getData());
            }


            if($form["timeC"]->getData() == Null && $form["priceC"]->getData() !== Null){
                $this->addFlash('danger', 'If you want to add a category please fill all fields! TC');
                return $this->redirectToRoute('option_add');
            }
            elseif ($form["timeC"]->getData() !== Null && $form["priceC"]->getData() == Null){
                $this->addFlash('danger', 'If you want to add a category please fill all fields! PC');
                return $this->redirectToRoute('option_add');
            }
            elseif ($form["timeC"]->getData() !== Null && $form["priceC"]->getData() !== Null){
                $catC = (new CategoryOption());
                $catC   ->setCategory("C")
                    ->setPrice($form["priceC"]->getData())
                    ->setTime($form["timeC"]->getData());
            }

            if(!isset($catA) && !isset($catB) && !isset($catC)){
                $this->addFlash('danger', 'You must enter at least one option!');
                return $this->redirectToRoute('option_add');
            }
            else{
                $em->persist($newoption);



                if(isset($catA)){
                    $catA->setIdOption($newoption);
                    $em->persist($catA);
                }
                if(isset($catB)){
                    $catB->setIdOption($newoption);
                    $em->persist($catB);
                }
                if(isset($catC)){
                    $catC->setIdOption($newoption);
                    $em->persist($catC);
                }

                $em->flush();
            }

            */
            $em->persist($newoption);
            $em->flush();
            $this->addFlash('success', 'The option has been successfully added!');
            return $this->redirectToRoute('option_list');
        }

        return $this->render('option/add.html.twig',[
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(int $id)
    {
        $this->addFlash('success', 'The option has been successfully deleted!');
        $em = $this->getDoctrine()->getManager();

        $deloption = $em->getRepository(Option::class)->find($id);

        //$cat_option= $deloption->getCategoryOption();

        //$cat_option->clear();

        //$deloption->getCategoryOption()->clear();
        //$deloption = $em->merge($deloption);

        //$em->remove($deloption);

        $deloption->setSupprime(1);

        $em->flush();

        return $this->redirectToRoute('option_list');
    }

    /**
     * @Route("/detail/{id}/addcategory", name="addcat")
     */
    public function addcat(Request $request, int $id)
    {
        $em = $this->getDoctrine()->getManager();
        $addoption = $em->getRepository(Option::class)->find($id);
        $newoption = (new CategoryOption())
            ->setIdOption($addoption);



        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(CatOptionType::class,$newoption);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()){

            $em->persist($newoption);
            $em->flush();
            $this->addFlash('success', 'The option has been successfully added!');
            return $this->redirectToRoute('option_detail', array( 'id'=> $id));
        }

        return $this->render('option/addcat.html.twig',[
            'form' => $form->createView(),
            'option' => $addoption,
        ]);
    }

    /**
     * @Route("/detail/{idOp}/editcategory/{idCat}", name="editcat")
     */
    public function editcat(int $idOp, int $idCat, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $currentoption = $this->categoryOptionRepository->findOneBy(['id' => $idCat]);

        $form = $this->createForm(CatOptionType::class,$currentoption);



        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()){

            $this->addFlash('success', 'The option has been successfully edited!');


            $em->flush();


            return $this->redirectToRoute('option_detail', array( 'id'=> $idOp));
        }

        return $this->render('option/editcat.html.twig',[
            'form' => $form->createView(),
            'option' => $em->getRepository(Option::class)->find($idOp),
        ]);
    }

    /**
     * @Route("/detail/{idOp}/deleteCat/{id}", name="deletecat")
     */
    public function deletecat(int $id, int $idOp)
    {
        $this->addFlash('success', 'The option category has been successfully deleted!');
        $em = $this->getDoctrine()->getManager();

        $deloption = $em->getRepository(CategoryOption::class)->find($id);



        $em->remove($deloption);

        $em->flush();

        return $this->redirectToRoute('option_detail', array( 'id'=> $idOp));
    }
}
