<?php

namespace App\Controller;

use App\Entity\Availability;
use App\Entity\Parkings;
use App\Entity\CategoryLocation;
use App\Entity\Categories;
use App\Entity\PhotosParking;
use App\Entity\Provider;
use App\Entity\EventsFromGCalendar;

use App\Entity\GoogleCalendarApi;
use App\Form\AvailabilityType;
use App\Form\ParkingType;
use App\Form\PhotoParkingType;
use App\Mail\ReponseMail;
use App\Mail\CalendarGoogle;
use App\Repository\AvailabilityRepository;
use App\Repository\GoogleCalendarApiRepository;
use App\Repository\MooveeCarRepository;
use App\Repository\MooveeCompanyRepository;
use App\Repository\MooveeUsersRepository;
use App\Repository\MooveeUserHasCarRepository;
use App\Repository\ParkingsRepository;
use App\Repository\PhotosParkingRepository;
use App\Repository\PlannedCleaningRepository;
use App\Repository\ProviderRepository;
use App\Repository\CategoryLocationRepository;
use App\Repository\CategoryProviderRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



/**
 * @Route("/location", name="parking_")
 */
class ParkingController extends AbstractController
{

    private $parkingsRepository;
    private $mooveeCompanyRepository;
    private $photosParkingRepository;
    private $availabilityRepository;
    private $plannedCleaningRepository;
    private $mooveeCarRepository;
    private $mooveeUserHasCarRepository;
    private $mooveeUsersRepository;
    private $providerRepository;
    private $categoryLocationRepository;
    private $categoryProviderRepository;
    private $googleCalendarApiRepository;


    public function __construct(
        MooveeUserHasCarRepository $mooveeUserHasCarRepository,
        MooveeCarRepository $mooveeCarRepository,
        PlannedCleaningRepository $plannedCleaningRepository,
        AvailabilityRepository $availabilityRepository,
        ParkingsRepository $parkingsRepository,
        MooveeCompanyRepository $mooveeCompanyRepository,
        PhotosParkingRepository $photosParkingRepository,
        MooveeUsersRepository $mooveeUsersRepository,
        ProviderRepository $providerRepository,
        CategoryLocationRepository $categoryLocationRepository,
        CategoryProviderRepository $categoryProviderRepository,
        GoogleCalendarApiRepository $googleCalendarApiRepository

    ) {
        $this->parkingsRepository = $parkingsRepository;
        $this->mooveeCompanyRepository = $mooveeCompanyRepository;
        $this->photosParkingRepository = $photosParkingRepository;
        $this->availabilityRepository = $availabilityRepository;
        $this->plannedCleaningRepository = $plannedCleaningRepository;
        $this->mooveeCarRepository = $mooveeCarRepository;
        $this->mooveeUserHasCarRepository = $mooveeUserHasCarRepository;
        $this->mooveeUsersRepository = $mooveeUsersRepository;
        $this->providerRepository = $providerRepository;
        $this->categoryLocationRepository = $categoryLocationRepository;
        $this->categoryProviderRepository = $categoryProviderRepository;
        $this->googleCalendarApiRepository = $googleCalendarApiRepository;
    }

    /**
     * @Route("", name="list")
     */
    public function index()
    {
        $user = $this->getUser();
        $provider = $user->getProvider();

        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render('parking/list.html.twig', [
                'parkings' => $this->parkingsRepository->findBy(['is_deleted' => 0]),
                'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $this->getUser()->getCodeCompany()]),
            ]);
        } elseif ($this->get('security.authorization_checker')->isGranted('ROLE_WORKER_ADMIN')) {
            return $this->render('parking/list.html.twig', [
                'parkings' => $this->parkingsRepository->findParkingsByCatProvider($provider),
                'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $this->getUser()->getCodeCompany()]),
            ]);
        } else {
            if ($user->getCodeCompany() != null) {
                return $this->render('parking/list.html.twig', [
                    'parkingsPublic' => $this->parkingsRepository->findBy(['company' => null, 'is_deleted' => 0]),
                    'parkingsPrivate' => $this->parkingsRepository->findBy(['company' => $this->mooveeCompanyRepository->findIdCompanyByCode($user->getCodeCompany()), 'is_deleted' => 0]),
                ]);
            } else {
                return $this->render('parking/list.html.twig', [
                    'parkingsPublic' => $this->parkingsRepository->findBy(['company' => null, 'is_deleted' => 0]),
                    'parkingsPrivate' => [],
                ]);
            }
        }
    }

    /**
     * @Route("/detail/{id}", name="detail")
     */
    public function detail(int $id)
    {
        $user = $this->getUser();
        $available = array();
        $availabilities = $this->availabilityRepository->findIncommingByParking($id);
        foreach ($availabilities as $a) {
            $products = $a->getProvider()->getProducts();
            foreach ($products as $p) {
                $catS = $p->getCategory();
                if ($catS != null) {

                    $catS = $p->getCategory()->getService()->getId();
                }
            }
        }
        $currentparking = $this->parkingsRepository->find($id);

        foreach ($availabilities as $availability) {
            $heuredeb = explode(":", $availability->getDebut());
            $heurefin = explode(":", $availability->getFin());

            $minutesdeb = ($heuredeb[0] * 60) + $heuredeb[1];
            $minutesfin = ($heurefin[0] * 60) + $heurefin[1];

            $duration = $minutesfin - $minutesdeb;

            $planned = $this->plannedCleaningRepository->findBy(['date' => $availability->getDate(), 'parkingId' => $availability->getParking(), 'valide' => null, 'supprime' => null]);

            $currentduration = 0;

            foreach ($planned as $plan) {
                $currentduration = $currentduration + $plan->getDuration();
            }
            $x = $duration - ($currentduration + 75);
            //dump($duration . " - (" . $currentduration . " + 75) = " . $x);
            if (($currentduration + 90) <= $duration) {

                $providerid =  $availability->getProvider();
                $parkingid = $availability->getParking();
                $providerCat = $this->categoryProviderRepository->findBy(['id_provider' => $providerid]);
                $parkingCat = $this->categoryLocationRepository->findBy(['id_location' => $parkingid]);
                foreach ($providerCat as $categoryOfProvider) {

                    $idOfProviderCat = $categoryOfProvider->getIdCategory();
                    foreach ($parkingCat as $categoryOfLocation) {
                        $idOfLocationCat = $categoryOfLocation->getCategory();
                        if ($idOfProviderCat == $idOfLocationCat) {
                            array_push($available, $availability);
                        }
                    }
                }
            }
        }


        return $this->render('parking/detail.html.twig', [
            'availabilities' => $available,
            'parking' => $currentparking,
            'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $this->getUser()->getCodeCompany()]),
            'car' => $this->mooveeUserHasCarRepository->findBy(['user_has_car_id_user' => $user, 'is_deleted' => null]),
            'providers' => $this->providerRepository->findBy(['supprime' => Null]),
            'catLocations' => $this->categoryLocationRepository->categoryByLocation($currentparking)


        ]);
    }


    /**
     * @Route("/edit/{id}", name="edit")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function edit(Request $request, int $id)
    {


        $em = $this->getDoctrine()->getManager();
        $editparking = $this->parkingsRepository->findOneBy(['id' => $id]);


        $form = $this->createForm(ParkingType::class, $editparking);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $editparking->setUpdatedDate(new \DateTime('now'));
            $em->persist($editparking);
            $em->flush();
            $this->addFlash('success', 'The parking has been successfully edited!');
            return $this->redirectToRoute('parking_list');
        }

        return $this->render('parking/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/delete/{id}", name="delete")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function delete(int $id)
    {
        $this->addFlash('success', 'The parking category has been successfully deleted!');
        $em = $this->getDoctrine()->getManager();

        $parking = $em->getRepository(Parkings::class)->find($id);

        $parking->setIsDeleted(1);


        $em->flush();

        return $this->redirectToRoute('parking_list');
    }

    /**
     * @Route("/add", name="add")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function add(Request $request)
    {
        $newparking = (new Parkings());


        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(ParkingType::class, $newparking);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $newparking->setCreatedDate(new \DateTime('now'));
            $newparking->setIsDeleted(0);
            $em->persist($newparking);
            $em->flush();



            $this->addFlash('success', 'The parking has been successfully added!');
            return $this->redirectToRoute('parking_list');
        }

        return $this->render('parking/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/detail/{id}/addphoto", name="addphoto")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function addphoto(Request $request, int $id)
    {

        if ($this->container->has('profiler')) {
            $this->container->get('profiler')->disable();
        }

        $newphoto = (new PhotosParking());


        $em = $this->getDoctrine()->getManager();

        $parking = $this->parkingsRepository->findOneBy(['id' => $id]);



        $form = $this->createForm(PhotoParkingType::class, $newphoto);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $files = $form->get('image')->getData();

            $newphoto->setParking($parking);

            foreach ($files as $file) {
                $photo = new $newphoto;

                $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();

                $file->move(
                    $this->getParameter('parking_directory'),
                    $fileName
                );

                $photo->setName($fileName);
                $photo->setParking($parking);
                $em->persist($photo);
                $em->flush();

                //$parking->addPhotosParking($newphoto);

            }

            $this->addFlash('success', 'Photo(s) has been successfully added!');

            return $this->redirectToRoute('parking_detail', array('id' => $id));
        }

        return $this->render('parking/addphoto.html.twig', [
            'form' => $form->createView(),
            'id' => $id,
        ]);
    }

    /**
     * @Route("/detail/{id}/deletephoto", name="deletephoto")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function listphoto(int $id)
    {
        $parking = $this->parkingsRepository->findOneBy(['id' => $id]);

        return $this->render('parking/delete.html.twig', [
            'images' => $this->photosParkingRepository->findBy(['parking' => $parking]),
            'id' => $id

        ]);
    }


    /**
     * @Route("/detail/{id}/deletephoto/delete/{idparking}", name="removephoto")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function removephoto(int $id, int $idparking)
    {
        $this->addFlash('success', 'The photo has been successfully deleted!');
        $em = $this->getDoctrine()->getManager();

        $parking = $em->getRepository(PhotosParking::class)->find($id);

        $em->remove($parking);


        $em->flush();

        return $this->redirectToRoute('parking_deletephoto', array('id' => $idparking));
    }


    /**
     * @Route("/{id}/availability", name="availability")
     * 
     */
    public function Availability(int $id, Request $request)
    {

        $Availability = (new Availability());
        $em = $this->getDoctrine()->getManager();
        $currentProvider = $this->providerRepository->findOneBy(['id' => $id]);
        $form = $this->createForm(AvailabilityType::class, $Availability);
        $form->handleRequest($request);
        $parking = $this->parkingsRepository->findOneBy(['id' => $id]);
        $company = $this->mooveeCompanyRepository->findOneBy(['id' => $parking->getCompany()]);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
                $Availability->setProvider($currentProvider);
                $Availability->setParking($parking);
            }
            $Availability->setDebut($form["from"]->getData()->format('H:i'));
            $Availability->setFin($form["to"]->getData()->format('H:i'));
            $Availability->setIsDeleted(0);
            $Availability->setParking($parking);
            try {

                $em->persist($Availability);
                $em->flush();
                $this->addFlash('success', 'The availability has been successfully added');
            } catch (\Doctrine\ORM\ORMException $e) {
                $this->addFlash('alert-warning', 'Something went wrong with connection, Please try again ');
            } catch (\Exception $e) {
                $this->addFlash('alert-warning', $e);
            } finally {
                return $this->redirectToRoute('parking_availability', array('id' => $id));
            }
        }
        return $this->render('parking/availability.html.twig', [
            'form' => $form->createView(),
            'availabilities' => $this->availabilityRepository->findIncommingByParking($parking),
            'parking' => $parking,
        ]);
    }
    /**
     * @Route("/addavailability", name="addavailability")
     * 
     */
    public function addvailability(Request $request)
    {
        $user = $this->getUser();
        $userprovider = $user->getProvider();

        $Availability = (new Availability());
        $em = $this->getDoctrine()->getManager();

        $availableId = array();
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {

            $form = $this->createFormBuilder($Availability)
                ->add('parking', EntityType::class, [
                    'label' => 'Parking',
                    'class' => Parkings::class,
                    'choices' => $this->parkingsRepository->findParkingsByCatProvider($userprovider),
                    'choice_label' => 'name',
                ])
                ->add('from', TimeType::class, [
                    'label' => 'From',
                    'widget' => 'single_text',

                ])
                ->add('to', TimeType::class, [
                    'label' => 'To',
                    'widget' => 'single_text',
                ])
                ->add('date', DateType::class, [
                    'label' => 'Date',
                    'widget' => 'single_text',

                ])
                ->getForm();
        } else {
            $form = $this->createForm(AvailabilityType::class, $Availability);
        }
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
                $Availability->setProvider($userprovider);
            }
            $Availability->setDebut($form["from"]->getData()->format('H:i'));
            $Availability->setFin($form["to"]->getData()->format('H:i'));
            $Availability->setIsDeleted(0);



            try {
                $em->persist($Availability);
                $em->flush();
                $availabilities = $this->availabilityRepository->findIncommingByProvider($userprovider);
                $orderbyProvider = $this->plannedCleaningRepository->findIncomingOrder();

                foreach ($availabilities as $availability) {
                    $plannedCleanning = 0;
                    $idAv = $availability->getProvider();
                    $idParking = $availability->getParking();
                    foreach ($orderbyProvider as $order) {
                        $idOr = $order->getProvider();
                        $idPar = $order->getParkingId();
                        if ($idAv == $idOr && $idPar == $idParking) {
                            $plannedCleanning++;
                        } else {
                            $plannedCleanning;
                        }
                    }
                    array_push($availableId, $plannedCleanning);
                }
            } catch (\Doctrine\ORM\ORMException $e) {
                $this->addFlash('alert-warning', 'Something went wrong with connection, Please try again ');
            } catch (\Exception $e) {
                $this->addFlash('alert-warning', $e);
            } finally {
                $this->addFlash('success', 'The availability has been successfully added');
                return $this->redirectToRoute('parking_addavailability');
            }


            $this->addFlash('success', 'The availability has been successfully added');
            return $this->redirectToRoute('parking_addavailability');
        }
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render('parking/addnewav.html.twig', [
                'form' => $form->createView(),
                'availabilities' => $this->availabilityRepository->findIncommingByProviderAdd($userprovider),
                'orderNumber' => $availableId,

            ]);
        }
        return $this->render('parking/addnewav.html.twig', [
            'form' => $form->createView(),
            'availabilities' => $this->availabilityRepository->findIncommingAdd(),
            'orderNumber' => $availableId,

        ]);
    }

    public function DeleteAvailability(int $id, int $idAvailability)
    {
        $em = $this->getDoctrine()->getManager();
        $availability = $em->getRepository(Availability::class)->findOneBy(['id' => $idAvailability]);
        $avIdPark = $availability->getParking()->getId();
        $avIdProvider = $availability->getProvider()->getId();
        $date = $availability->getDate();
        $plannedService = $this->plannedCleaningRepository->findbyparkingandprovider($avIdPark, $avIdProvider, $date);


        $providers = $this->mooveeUsersRepository->findAdminWorkerByProvider($availability->getProvider());
        $idEvent = preg_replace('/\s/', '', ($availability->getId() . "" . strtolower($availability->getParking()->getName())));


        try {
            if ($providers != null) {
                foreach ($providers as $provider) {
                    if ($provider->getGoogleToken() != null) {
                        $googleToken = $this->googleCalendarApiRepository->findOneBy(['iduser' => $provider->getId()]);
                        $googleCalendar = new CalendarGoogle();
                        $client = $googleCalendar->getClient();
                        $client->setAccessToken($googleToken->getToken());
                        $googleCalendar->delete($client, $googleToken->getCalendarId(), $idEvent);
                    }
                }
            }
            $user = $this->getUser();
            if ($user->getGoogleToken() != null) {
                $googleToken = $this->googleCalendarApiRepository->findOneBy(['iduser' => $user->getId()]);
                $googleCalendar = new CalendarGoogle();
                $client = $googleCalendar->getClient();
                $client->setAccessToken($googleToken->getToken());
                $googleCalendar->delete($client, $googleToken->getCalendarId(), $idEvent);
            }
        } catch (\Exception $e) {
            if ($plannedService == null) {
                $this->addFlash('success', 'The availability has been successfully deleted!');
                $this->addFlash('success', 'The order has been successfully deleted! But we couldn\'nt delete a event from your calendar');
            } else {
                $this->addFlash('alert-warning', 'The availability can\'t be deleted !');
            }
        }
        $availability->setIsDeleted(1);
        $em->flush();


        return null;
    }

    /**
     * @Route("/{id}/availability/{idAvailability}/deletelist", name="availability_deletelist")
     *  
     */
    public function DeleteListAvailability(int $id, int $idAvailability)
    {
        $this->DeleteAvailability($id, $idAvailability);
        return $this->redirectToRoute('parking_addavailability');
    }
    /**
     * @Route("/{id}/availability/{idAvailability}/deletelocation", name="availability_deletelocation")
     *  
     */
    public function DeleteLocationAvailability(int $id, int $idAvailability)
    {
        $this->DeleteAvailability($id, $idAvailability);
        return $this->redirectToRoute('parking_availability', array('id' => $id));
    }


    /**
     * @Route("/{id}/availability/{idAvailability}/change", name="availability_change")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function ChangeAvailability(int $id, int $idAvailability, Request $request)
    {


        $em = $this->getDoctrine()->getManager();


        $Availability = $em->getRepository(Availability::class)->findOneBy(['id' => $idAvailability]);


        $form = $this->createForm(AvailabilityType::class, $Availability);

        $form->get('from')->setData(\DateTime::createFromFormat('H:i', $Availability->getDebut()));
        $form->get('to')->setData(\DateTime::createFromFormat('H:i', $Availability->getFin()));

        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {

            $Availability->setDebut($form["from"]->getData()->format('H:i'));
            $Availability->setFin($form["to"]->getData()->format('H:i'));

            $em->persist($Availability);

            $em->flush();
            $this->addFlash('success', 'The availability has been successfully edited');
            return $this->redirectToRoute('parking_availability', array('id' => $id));
        }

        return $this->render('parking/editavailability.html.twig', [
            'form' => $form->createView(),
            'parking' => $id,

        ]);
    }

    /**
     * @Route("/{id}/availability/{idAvailability}/show", name="availability_show")
     */
    public function showLocationAvailability(int $id, int $idAvailability)
    {
        $this->ShowAvailability($id, $idAvailability);

        $this->addFlash('success', 'The availability has been successfully added');
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('parking_addavailability');
        }
        return $this->redirectToRoute('parking_availability', array('id' => $id));
    }
    /**
     * @Route("/{id}/availability/{idAvailability}/showAll", name="availability_showAll")
     */
    public function showAllAvailability(int $id, int $idAvailability)
    {
        $this->ShowAvailability($id, $idAvailability);

        $this->addFlash('success', 'The availability has been successfully added');
        return $this->redirectToRoute('parking_addavailability');
    }

    public function ShowAvailability($id,  $idAvailability)
    {
        $this->addFlash('success', 'The availability has been successfully showed!');
        $em = $this->getDoctrine()->getManager();
        $gCalendarEvent = new  EventsFromGCalendar();
        //find availability by id (idAvailability)
        $availability = $em->getRepository(Availability::class)->findOneBy(['id' => $idAvailability]);
        $user = $this->getUser();

        /****************Google calendar api*******************/
        $providers = $this->mooveeUsersRepository->findAdminWorkerByProvider($availability->getProvider());
        $eventName = preg_replace('/\s/', '', ($availability->getId() . strtolower($availability->getParking()->getName()) .$user->getId()));
        date_default_timezone_set('Europe/Luxembourg');
        $startTime = $availability->getDate()->format('Y-m-d') . " " . $availability->getDebut();
        $endTime = $availability->getDate()->format('Y-m-d') . " " . $availability->getFin();

        if ($providers != null) {
            foreach ($providers as $provider) {
                if ($provider->getGoogleToken() == 1) {
                    $role = $provider->getRoles();
                    if ($role = "ROLE_WORKER_ADMIN") {
                        $googleToken = $this->googleCalendarApiRepository->findOneBy(['iduser' => $provider->getId()]);
                        $googleCalendar = new CalendarGoogle();
                        $client = $googleCalendar->getClient();
                        $client->setAccessToken($googleToken->getToken());
                        $newEvent = $googleCalendar->addEvent( $googleToken->getCalendarId(), $client, $availability->getParking()->getName(), $availability->getParking()->getAddress(), date('Y-m-d\TH:i:sP', strtotime($startTime)), date('Y-m-d\TH:i:sP', strtotime($endTime)), "2");
                        $this->saveEventToGCalendar($eventName, $user->getId(), $newEvent->getId(), $googleToken->getCalendarId());

                    }
                }
            }
        }
        if ($user->getGoogleToken() != null) {
            $googleToken = $this->googleCalendarApiRepository->findOneBy(['iduser' => $user->getId()]);
            $googleCalendar = new CalendarGoogle();
            $client = $googleCalendar->getClient();
            $client->setAccessToken($googleToken->getToken());
            $newEvent = $googleCalendar->addEvent($googleToken->getCalendarId() , $client, $availability->getParking()->getName(), $availability->getParking()->getAddress(), date('Y-m-d\TH:i:sP', strtotime($startTime)), date('Y-m-d\TH:i:sP', strtotime($endTime)), "2");
            $this->saveEventToGCalendar($eventName, $user->getId(), $newEvent->getId(), $googleToken->getCalendarId());
           
        }
        //show availability
        
        $availability->setAffiche(1);
        $em->flush();
        return $availability;
    }
    /**
     * @Route("/listofavailability", name="listofavailability")
     * 
     */
    public function listofavailability()
    {
        $user = $this->getUser();
        $idprovider = $user->getProvider();

        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {

            $availabilities = $this->availabilityRepository->findIncommingByProvider($idprovider);
        } else {
            $availabilities = $this->availabilityRepository->findIncomming();
        }

        $orderbyProvider = $this->plannedCleaningRepository->findIncomingOrder(["valide" => Null]);
        $availableId = array();

        //ToDoAgain with sql
        foreach ($availabilities as $availability) {
            $idAv = $availability->getProvider();
            $idParking = $availability->getParking();
            $datAv = $availability->getDate();
            $plannedCleanning = 0;
            foreach ($orderbyProvider as $order) {
                $idOr = $order->getProvider();
                $idPar = $order->getParkingId();
                $datOrder = $order->getDate();
                if ($idAv == $idOr && $idPar == $idParking && $datAv == $datOrder) {
                    $plannedCleanning++;
                } else {
                    $plannedCleanning;
                }
            }
            array_push($availableId, $plannedCleanning);
        }

        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render('parking/listofavailability.html.twig', [
                'availabilities' => $this->availabilityRepository->findIncommingByProvider($idprovider),
                'orderNumber' => $availableId,
            ]);
        } else {
            return $this->render('parking/listofavailability.html.twig', [
                'availabilities' => $this->availabilityRepository->findIncomming(),
                'orderNumber' => $availableId
            ]);
        }
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

    public function saveEventToGCalendar($eventName, $user, $newEventId, $calendarId){
        $em = $this->getDoctrine()->getManager();
        $gCalendarEvent = new  EventsFromGCalendar();
        $gCalendarEvent->setEventName($eventName);
        $gCalendarEvent->setUserId($user);
        $gCalendarEvent->setEventId($newEventId);
        $gCalendarEvent->setGoogleCalendarId($calendarId);
        $em->persist($gCalendarEvent);
        $em->flush();
    }

    /**
     * @Route("/detail/{id}/addcategory", name="addcat")
     *  @Security("has_role('ROLE_ADMIN')")
     */
    public function addCatToParking(Request $request, int $id)
    {

        $em = $this->getDoctrine()->getManager();
        $newcategory = new CategoryLocation();

        $currentparking = $this->parkingsRepository->findOneBy(['id' => $id]);


        $form = $this->createFormBuilder($newcategory)
            ->add(
                'category',
                EntityType::class,
                array(
                    'label' => "Category",
                    'class' => Categories::class,
                    'choice_label' => 'category'

                )
            )
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $newcategory->setIdParking($currentparking);

            $check = $em->getRepository(CategoryLocation::class)->findOneBy(['id_location' => $currentparking, 'id_category' => $form->getData()->getCategory()]);
            if ($check == null) {

                $em->persist($newcategory);
                $em->flush();
                $this->addFlash('success', 'The category has been successfully added!');
            }

            return $this->redirectToRoute('parking_detail', ['id' => $id]);
        }

        return $this->render('parking/addcat.html.twig', [
            'form' => $form->createView(),
            'park' => $currentparking
        ]);
    }

    /**
     * @Route("/recurrence", name="recurrence")
     */

    public function recurrenceAv(Request $request)
    {


        $user = $this->getUser();
        $userprovider = $user->getProvider();

        $availableId = array();

        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {

            $form = $this->createFormBuilder()
                ->add('parking', EntityType::class, [
                    'label' => 'Parking',
                    'class' => Parkings::class,
                    'choices' => $this->parkingsRepository->findParkingsByCatProvider($userprovider),
                    'choice_label' => 'name',
                ])
                ->add('from', TimeType::class, [
                    'label' => 'From',
                    'widget' => 'single_text',

                ])
                ->add('to', TimeType::class, [
                    'label' => 'To',
                    'widget' => 'single_text',
                ])
                ->add('Startdate', DateType::class, [
                    'label' => 'Start Date',
                    'widget' => 'single_text',

                ])
                ->add('Enddate', DateType::class, [
                    'label' => 'End date',
                    'widget' => 'single_text',

                ])
                ->add('rec', ChoiceType::class, [
                    'label' => 'Recurrence',
                    'choices' => [
                        'Monday' => '1',
                        'Tuesday' => '2',
                        'Wednesday' => '3',
                        'Thursday' => '4',
                        'Friday' => '5',
                        'Saturday' => '6',
                        'Sunday' => '7'
                    ],
                ])
                ->getForm();
        } else {
            $form = $this->createFormBuilder()
                ->add('parking', EntityType::class, [
                    'label' => 'Parking',
                    'class' => Parkings::class,
                    'query_builder' => function (ParkingsRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->orderBy('u.name', 'ASC');
                    },
                    'choice_label' => 'name',
                ])
                ->add('provider', EntityType::class, [
                    'label' => 'Provider',
                    'class' => Provider::class,
                    'query_builder' => function (ProviderRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->where('u.supprime is Null')
                            ->orderBy('u.name', 'ASC');
                    },
                    'choice_label' => 'name',
                ])
                ->add('from', TimeType::class, [
                    'label' => 'From',
                    'widget' => 'single_text',

                ])
                ->add('to', TimeType::class, [
                    'label' => 'To',
                    'widget' => 'single_text',
                ])
                ->add('Startdate', DateType::class, [
                    'label' => 'Start Date',
                    'widget' => 'single_text',

                ])
                ->add('Enddate', DateType::class, [
                    'label' => 'End date',
                    'widget' => 'single_text',

                ])
                ->add('rec', ChoiceType::class, [
                    'label' => 'Recurrence',
                    'choices' => [
                        'Monday' => '1',
                        'Tuesday' => '2',
                        'Wednesday' => '3',
                        'Thursday' => '4',
                        'Friday' => '5',
                        'Saturday' => '6',
                        'Sunday' => '7'
                    ],
                ])
                ->getForm();
        }
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $startDate = $form["Startdate"]->getData()->format('Y-m-d');
            $endDate = $form["Enddate"]->getData()->format('Y-m-d');
            $recurrence =  $form["rec"]->getData();

            $dateOfAvailabilities = $this->getDateForSpecificDayBetweenDates($startDate, (string)$endDate, $recurrence);

            foreach ($dateOfAvailabilities as $dateOfAvailability) {
                $parking = $form["parking"]->getData();
                if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
                    $provider = $userprovider;
                } else {
                    $provider = $form["provider"]->getData();
                }
                $ymd = new \DateTime($dateOfAvailability);
                $from = $form["from"]->getData()->format('H:i');
                $to = $form["to"]->getData()->format('H:i');
                $this->addMultipleAvailability($parking, $provider, $ymd, $from, $to);
            }

            $availabilities = $this->availabilityRepository->findIncommingByProvider($userprovider);
            $orderbyProvider = $this->plannedCleaningRepository->findIncomingOrder();

            foreach ($availabilities as $availability) {
                $plannedCleanning = 0;
                $idAv = $availability->getProvider();
                $idParking = $availability->getParking();
                foreach ($orderbyProvider as $order) {
                    $idOr = $order->getProvider();
                    $idPar = $order->getParkingId();
                    if ($idAv == $idOr && $idPar == $idParking) {
                        $plannedCleanning++;
                    } else {
                        $plannedCleanning;
                    }
                }
                array_push($availableId, $plannedCleanning);
            }


            $this->addFlash('success', 'The availability has been successfully added');
            return $this->redirectToRoute('parking_addavailability', []);
        }
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render('parking/recurrentAv.html.twig', [
                'form' => $form->createView(),
                'availabilities' => $this->availabilityRepository->findIncommingByProviderAdd($userprovider),
                'orderNumber' => $availableId,

            ]);
        }

        return $this->render('parking/recurrentAv.html.twig', [
            'form' => $form->createView(),
            'availabilities' => $this->availabilityRepository->findIncommingAdd(),
            'orderNumber' => $availableId,

        ]);
    }
    function getDateForSpecificDayBetweenDates($startDate, $endDate, $day_number)
    {
        $endDate = strtotime($endDate);
        $days = array('1' => 'Monday', '2' => 'Tuesday', '3' => 'Wednesday', '4' => 'Thursday', '5' => 'Friday', '6' => 'Saturday', '7' => 'Sunday');
        for ($i = strtotime($days[$day_number], strtotime($startDate)); $i <= $endDate; $i = strtotime('+1 week', $i))
            $date_array[] = date('Y-m-d', $i);

        return $date_array;
    }
    function addMultipleAvailability($parking, $provider, $date, $from, $to)
    {
        $Availability = new Availability();
        $em = $this->getDoctrine()->getManager();
        $Availability->setParking($parking);
        $Availability->setProvider($provider);
        $Availability->setDate($date);
        $Availability->setDebut($from);
        $Availability->setFin($to);
        $Availability->setIsDeleted(0);
        $Availability->setAffiche(1);
        $em->persist($Availability);
        $em->flush();
    }
}
