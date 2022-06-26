<?php

namespace App\Controller;

use App\Entity\CategoryProduct;
use App\Entity\Option;
use App\Entity\Products;
use App\Form\CatProductType;
use App\Form\ProductType;
use App\Repository\CategoryProductRepository;
use App\Repository\CategoryOptionRepository;
use App\Repository\MooveeUsersRepository;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\Exception\FileException;


/**
 * @Route("/product", name="product_")
 * 
 */
class ProductController extends AbstractController
{
    private  $categoryProductRepository;
    private $productsRepository;
    private $mooveeUsersRepository;


    public function __construct(
        CategoryProductRepository $categoryProductRepository,
        ProductsRepository $productsRepository,
        MooveeUsersRepository $mooveeUsersRepository
    ) {
        $this->categoryProductRepository = $categoryProductRepository;
        $this->productsRepository = $productsRepository;
        $this->mooveeUsersRepository = $mooveeUsersRepository;
    }


    /**
     * @Route("", name="list")
     */
    public function list()
    {
        $user = $this->getUser();
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {

            return $this->render('product/list.html.twig', [
                'products' => $this->productsRepository->findBy(['id_provider' => $user->getProvider()],['categoryService'=> 'asc']),
            ]);
        }
        return $this->render('product/list.html.twig', [
            'products' => $this->productsRepository->findBy(['supprime' => Null],['categoryService'=> 'asc']),
        ]);
    }
    /**
     * @Route("/detail/{id}", name="detail")
     */
    public function detail(int $id)
    {
        //dump($this->productsRepository->find($id));die;

        return $this->render('product/detail.html.twig', [
            'product' => $this->productsRepository->find($id),

        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit(Request $request, int $id)
    {

        $em = $this->getDoctrine()->getManager();
        $currentproduct = $this->productsRepository->findOneBy(['id' => $id]);
        $car = NULL;

        $img = $currentproduct->getPhoto();

        if ($img != null) {
            try {

                $currentproduct->setPhoto(new File($this->getParameter('product_directory') . '/' . $img));
            } catch (FileException $e) {
                $this->addFlash('success', 'The product has been successfully edited! But we couldn\'nt find any photo for the product, maybe file is deleted, please choose again photo for your product');
                $currentproduct->setPhoto(NULL);
            }
        }


        $comm = $currentproduct->getCommission();
        $provider = $currentproduct->getIdProvider();

        $form = $this->createForm(ProductType::class, $currentproduct);

        $form->handleRequest($request);


        if ($form->isSubmitted()) {
            if ($form->get('image')->getData() != null) {

                /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
                $file = $form->get('image')->getData();

                $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();

                try {
                    $file->move(
                        $this->getParameter('product_directory'),
                        $fileName
                    );
                } catch (FileException $e) {
                    $this->addFlash('success', 'ERROR');
                    return $this->redirectToRoute('product_list');
                }
                $currentproduct->setPhoto($fileName);
            } else {
                if ($img != null) {
                $currentproduct->setPhoto($img);
                }else{
                    $currentproduct->setPhoto(NULL);


                }
                // $currentproduct->setPhoto(new File($this->getParameter('product_directory') . '/' . $img));

            }

            if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
                $currentproduct->setCommission($comm);
                //$currentproduct->setIdProvider($provider);
            } else {
                $comm = $form->getData()->getCommission();
                $comm = $comm / 100;
                $currentproduct->setCommission($comm);
            }


            $this->addFlash('success', 'The product has been successfully edited!');
            $em->flush();
            return $this->redirectToRoute('product_list');
        }
        return $this->render('product/edit.html.twig', [
            'form' => $form->createView(),
            'currentproduct' => $currentproduct,
            'comm' => $comm * 100
        ]);
    }
    /**
     * @Route("/add", name="add")
     */
    public function add(Request $request)
    {
        $newproduct = (new Products());

        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(ProductType::class, $newproduct);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $form->get('image')->getData();
            if ($file != null) {

                $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();

                try {
                    $file->move(
                        $this->getParameter('product_directory'),
                        $fileName
                    );
                } catch (FileException $e) {
                    $this->addFlash('success', 'ERROR');
                    return $this->redirectToRoute('product_list');
                }

                $newproduct->setPhoto($fileName);
            }

            $commPercent = $form->getData()->getCommission();
            $comm = $commPercent / 100;
            $newproduct->setCommission($comm);

            $em->persist($newproduct);
            $em->flush();
            $this->addFlash('success', 'The product has been successfully added!');
            return $this->redirectToRoute('product_list');
        }

        return $this->render('product/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(int $id)
    {
        $this->addFlash('success', 'The product has been successfully deleted!');
        $em = $this->getDoctrine()->getManager();
        /*
        $delproduct= $em->getRepository(Products::class)->find($id);
        $options= $em->getRepository(Option::class)->findby(['id_product' => $id]);
        $catProduct = $em->getRepository(CategoryProduct::class)->findby(['id_product' => $id]);
        foreach ($options as $option){
            $option->getCategoryOption()->clear();
            $sup = $em->merge($option);
            $em->remove($option);
        }

        foreach ($catProduct as $product){
            $em->remove($product);
        }




        $em->remove($delproduct);
        */
        $delproduct = $em->getRepository(Products::class)->find($id);
        $options = $em->getRepository(Option::class)->findby(['id_product' => $id]);

        foreach ($options as $option) {
            $option->setSupprime(1);
        }
        $delproduct->setSupprime(1);
        $em->flush();

        return $this->redirectToRoute('product_list');
    }

    /**
     * @Route("/detail/{id}/addcategory", name="addcat")
     */
    public function addcat(Request $request, int $id)
    {
        $em = $this->getDoctrine()->getManager();
        $addproduct = $em->getRepository(Products::class)->find($id);
        $newproduct = (new CategoryProduct())
            ->setIdProduct($addproduct);



        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(CatProductType::class, $newproduct);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($newproduct);
            $em->flush();
            $this->addFlash('success', 'The product has been successfully added!');
            return $this->redirectToRoute('product_detail', array('id' => $id));
        }

        return $this->render('product/addcat.html.twig', [
            'form' => $form->createView(),
            'product' => $addproduct,
        ]);
    }

    /**
     * @Route("/detail/{idProd}/editcategory/{idCat}", name="editcat")
     */
    public function editcat(int $idProd, int $idCat, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $currentproduct = $this->categoryProductRepository->findOneBy(['id' => $idCat]);

        $form = $this->createForm(CatProductType::class, $currentproduct);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('success', 'The product has been successfully edited!');

            $em->flush();

            return $this->redirectToRoute('product_detail', array('id' => $idProd));
        }

        return $this->render('product/editcat.html.twig', [
            'form' => $form->createView(),
            'product' => $em->getRepository(Products::class)->find($idProd),
        ]);
    }

    /**
     * @Route("/detail/{idProd}/deleteCat/{id}", name="deletecat")
     */
    public function deletecat(int $id, int $idProd)
    {
        $this->addFlash('success', 'The product category has been successfully deleted!');
        $em = $this->getDoctrine()->getManager();

        $delproduct = $em->getRepository(CategoryProduct::class)->find($id);
        $em->remove($delproduct);

        $em->flush();

        return $this->redirectToRoute('product_detail', array('id' => $idProd));
    }

    /**
     *  @Route("/adminworkerlist", name="adminworkerlist")
     */

    public function workeradminlist()
    {

        $user =  $this->getUser();
        $idprovider = $user->getProvider()->getId();

        $products = $this->productsRepository->findProductsByCatAndOption($idprovider);

        return $this->render('product/adminworkerlist.html.twig', [
            'products' => $products,
        ]);
    }
    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
}
