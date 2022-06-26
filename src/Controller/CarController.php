<?php

namespace App\Controller;

use App\Entity\MooveeCar;
use App\Entity\MooveeUserHasCar;
use App\Form\UserHasCarType;
use App\Repository\MooveeCarRepository;
use App\Repository\MooveeCompanyRepository;
use App\Repository\MooveeUserHasCarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * This controller is for cars
 * index : list of all cars that are in the database 
 * add : to add a new car in the database
 * edit :
 * delete :
 */


/**
 * @Route("/car", name="car_")
 */
class CarController extends AbstractController
{

    private $mooveeCarRepository;
    private $mooveeUserHasCarRepository;
    private $mooveeCompanyRepository;

    public function __construct(MooveeCompanyRepository $mooveeCompanyRepository, MooveeCarRepository $mooveeCarRepository, MooveeUserHasCarRepository $mooveeUserHasCarRepository)
    {
        $this->mooveeCarRepository = $mooveeCarRepository;
        $this->mooveeUserHasCarRepository = $mooveeUserHasCarRepository;
        $this->mooveeCompanyRepository = $mooveeCompanyRepository;
    }

    /**
     * @Route("", name="list")
     */
    public function index()
    {
        $user = $this->getUser();

        $cars = $this->mooveeUserHasCarRepository->findBy(['user_has_car_id_user' => $user->getId(), 'is_deleted' => null]);
        //echo('<script>alert("'. $user->getId() .'")</script>');
        return $this->render('car/list.html.twig', [
            'cars' => $cars,
            'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $this->getUser()->getCodeCompany()]),
        ]);
    }


    /**
     * @Route("/add", name="add")
     */
    public function add(Request $request)
    {
        $user = $this->getUser();
        $user_has_car = (new MooveeUserHasCar);
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(UserHasCarType::class, $user_has_car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('success', 'Your car has been successfully added!');
            $user_has_car->setCreatedDate(new \DateTime('now'))
                ->setUserHasCarIdUser($user);
            $em->persist($user_has_car);
            $em->flush();
            return $this->redirectToRoute('car_list');
        }

        return $this->render('car/add.html.twig', [
            'form' => $form->createView(),
            'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $this->getUser()->getCodeCompany()]),
        ]);
    }
    


    /**
     * @Route("/edit/{id}", name="edit" )
     */
    public function edit(int $id, Request $request)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $user_has_car = $this->mooveeUserHasCarRepository->findOneBy(['user_has_car_id_user' => $user->getId(), 'user_has_car_id_car' => $id]);

        $currentcar = $em->getRepository(MooveeCar::class)->find($id);

        $form = $this->createForm(UserHasCarType::class, $user_has_car);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('success', 'Your car has been successfully edited!');
            $user_has_car->setUpdatedDate(new \DateTime('now'));
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('car_list');
        }


        return $this->render('car/edit.html.twig', [
            'form' => $form->createView(),
            'car' => $user_has_car,
            'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $this->getUser()->getCodeCompany()]),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(int $id)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $car = $this->mooveeUserHasCarRepository->findOneBy(['user_has_car_id_car' => $id, 'user_has_car_id_user' => $user->getId()]);

        $car->setIsDeleted(1);

        $em->flush();

        $this->addFlash('success', 'The car as been succesfully deleted !');
        return $this->redirectToRoute("car_list");
    }
}
