<?php

namespace App\Controller;


use App\Entity\Categories;
use App\Entity\Service;
use App\Form\CategoriesType;
use App\Form\ServiceType;
use App\Repository\CategoriesRepository;
use App\Repository\ServiceRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/", name="category_")
 * @Security("has_role('ROLE_ADMIN')")
 */
class CategoryController extends AbstractController
{

    private $categoriesRepository;
    private $serviceRepository;


    public function __construct(CategoriesRepository $categoriesRepository,
    ServiceRepository $serviceRepository
    
    )
    {
        $this->serviceRepository = $serviceRepository;
        $this->categoriesRepository = $categoriesRepository;
    }

    /************************************************ CATEGORIES *******************************************************************/
    /**
     * This section is for categories such as a Care, Car cleaning etc...
     * index : list of all categories that are in the database 
     * addnewcat : to add a new car in the database
     * editcat : edit a category
     */

    /**
     * @Route("category", name="index")
     * 
     */
    public function index()
    {

        return $this->render('category/index.html.twig', [
            'categories' => $this->categoriesRepository->findAll()
        ]);
    }

    /**
     * @Route("/addcategory", name="add")
     *  @Security("has_role('ROLE_ADMIN')")
     */
    public function addnewcat(Request $request)
    {
        $newcategory = new Categories();

        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(CategoriesType::class, $newcategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $form->get('image')->getData();

            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();

            try {
                $file->move(
                    $this->getParameter('category_directory'),
                    $fileName
                );
            } catch (FileException $e) {
                $this->addFlash('success', 'ERROR');
                return $this->redirectToRoute('category_index');
            }

            $newcategory->setPhoto($fileName);


            $em->persist($newcategory);
            $em->flush();
            $this->addFlash('success', 'The service has been successfully added!');
            return $this->redirectToRoute('category_index');
        }

        return $this->render('category/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/editcategory/{id}", name="edit")
     *  @Security("has_role('ROLE_ADMIN')")
     */
    public function editcat(Request $request, int $id)
    {

        $em = $this->getDoctrine()->getManager();
        $currentcategory = $this->categoriesRepository->findOneBy(['id' => $id]);
        $img = $currentcategory->getPhoto();

        if ($img != "") {
            try {
                $currentcategory->setPhoto(new File($this->getParameter('category_directory') . '/' . $img));
            } catch (FileException $e) {
                $this->addFlash('success', 'The service has been successfully edited! But we couldn\'nt find any photo for the service, maybe file is deleted, please choose again photo for your service');
                $currentcategory->setPhoto(0);
            }
        }

        //echo("<script>alert('".$img."')</script>");
        $form = $this->createForm(CategoriesType::class, $currentcategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            if ($form->get('image')->getData() != null) {


                /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
                $file = $form->get('image')->getData();
                $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
                try {
                    $file->move(
                        $this->getParameter('category_directory'),
                        $fileName
                    );
                } catch (FileException $e) {
                    $this->addFlash('success', 'ERROR');
                    return $this->redirectToRoute('category_list');
                }
                $currentcategory->setPhoto($fileName);
            } else {
                if ($img != "") {

                    try {
                        $currentcategory->setPhoto($img);
                    } catch (FileException $e) {
                        $this->addFlash('success', 'The service has been successfully edited! But we couldn\'nt find any photo for the service, maybe file is deleted, please choose again photo for your service');
                        $currentcategory->setPhoto(0);
                    }
                }
            }
            $this->addFlash('success', 'The service has been successfully edited!');

            $em->flush();
            return $this->redirectToRoute('category_index');
        }

        return $this->render('category/edit.html.twig', [
            'form' => $form->createView(),
            'cat' => $currentcategory
        ]);
    }



    /************************************************ SERVICES *******************************************************************/
    /**
     * This section is for SERVICES such as a CAR, WELNESS service etc...
     * myservices : list of all services that are in the database 
     * addService : to add a new service in the database
     * editcat : edit a service
     */


    /**
     * @Route("service", name="services")
     * 
     */
    public function myservices()
    {

        $myinfo = array();
        $services = $this->serviceRepository->findAll();
        foreach($services as $service){
            $categories = $this->categoriesRepository->findBy(['idservice' => $service]); 
            array_push($myinfo, [$service, $categories]);

        }
        return $this->render('service/index.html.twig', [
            'service' => $myinfo
        ]);
    }

    /**
     * @Route("/addService", name="addService")
     */
    public function addService(Request $request)
    {
        $newservice = new Service();

        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(ServiceType::class, $newservice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            

            $em->persist($newservice);
            $em->flush();
            $this->addFlash('success', 'The service has been successfully added!');
            return $this->redirectToRoute('category_services');
        }

        return $this->render('service/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/editService/{id}", name="editService")
     */
    public function editService(Request $request, int $id)
    {

        $em = $this->getDoctrine()->getManager();
        $currentservice = $this->serviceRepository->findOneBy(['id' => $id]);

        $form = $this->createForm(CategoriesType::class, $currentservice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->addFlash('success', 'The service has been successfully edited!');

            $em->flush();
            return $this->redirectToRoute('category_services');
        }

        return $this->render('service/edit.html.twig', [
            'form' => $form->createView(),
            'service' => $currentservice
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
