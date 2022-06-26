<?php

namespace App\Controller;

use App\Entity\PlannedCleaning;
use App\Entity\PlannedCleaningOptions;
use App\Entity\Reduction;
use App\Mail\ReponseMail;
use App\Mail\CalendarGoogle;
use App\Entity\MooveeUserHasCar;
use App\Entity\CreditCard;
use App\Form\UserHasCarType;
use App\Repository\GoogleCalendarApiRepository;
use App\Repository\ParkingsRepository;
use App\Repository\AvailabilityRepository;
use App\Repository\MooveeCarRepository;
use App\Repository\CategoriesRepository;
use App\Repository\CategoryOptionRepository;
use App\Repository\CreditCardRepository;
use App\Repository\MooveeCompanyRepository;
use App\Repository\MooveeUserHasCarRepository;
use App\Repository\PlannedCleaningRepository;
use App\Repository\ProductsRepository;
use App\Repository\ReductionRepository;
use App\Repository\MooveeUsersRepository;
use App\Repository\OptionRepository;
use App\Repository\CategoryProductRepository;
use App\Repository\ServiceRepository;
use App\Repository\CategoryLocationRepository;
use App\Repository\CategoryProviderRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

/**
 * @Route("/", name="carservice_")
 */
class CarServicesController extends AbstractController
{
    private $mooveeCompanyRepository;
    private $availabilityRepository;
    private $categoryOptionRepository;
    private $mooveeUserHasCarRepository;
    private $optionRepository;
    private $categoryProductRepository;
    private $creditCardRepository;
    private $plannedCleaningRepository;
    private $parkingsRepository;
    private $categoriesRepository;
    private $productsRepository;
    private $mooveeUsersRepository;
    private $serviceRepository;
    private $categoryLocationRepository;
    private $categoryProviderRepository;
    private $googleCalendarApiRepository;
    private $mooveeCarRepository;



    public function __construct(
        MooveeUsersRepository $mooveeUsersRepository,
        ReductionRepository $reductionRepository,
        PlannedCleaningRepository $plannedCleaningRepository,
        CreditCardRepository $creditCardRepository,
        ProductsRepository $productsRepository,
        MooveeUserHasCarRepository $mooveeUserHasCarRepository,
        MooveeCompanyRepository $mooveeCompanyRepository,
        AvailabilityRepository $availabilityRepository,
        CategoryOptionRepository $categoryOptionRepository,
        CategoriesRepository $categoriesRepository,
        CategoryProductRepository $categoryProductRepository,
        OptionRepository $optionRepository,
        ParkingsRepository $parkingsRepository,
        ServiceRepository $serviceRepository,
        CategoryLocationRepository $categoryLocationRepository,
        CategoryProviderRepository $categoryProviderRepository,
        GoogleCalendarApiRepository $googleCalendarApiRepository,
        MooveeCarRepository $mooveeCarRepository


    ) {
        $this->mooveeCompanyRepository = $mooveeCompanyRepository;
        $this->availabilityRepository = $availabilityRepository;
        $this->categoryOptionRepository = $categoryOptionRepository;
        $this->mooveeUserHasCarRepository = $mooveeUserHasCarRepository;
        $this->productsRepository = $productsRepository;
        $this->creditCardRepository = $creditCardRepository;
        $this->plannedCleaningRepository = $plannedCleaningRepository;
        $this->reductionRepository = $reductionRepository;
        $this->categoryProductRepository = $categoryProductRepository;
        $this->optionRepository = $optionRepository;
        $this->categoriesRepository = $categoriesRepository;
        $this->parkingsRepository = $parkingsRepository;
        $this->mooveeUsersRepository = $mooveeUsersRepository;
        $this->serviceRepository = $serviceRepository;
        $this->categoryLocationRepository = $categoryLocationRepository;
        $this->categoryProviderRepository = $categoryProviderRepository;
        $this->googleCalendarApiRepository = $googleCalendarApiRepository;
        $this->mooveeCarRepository = $mooveeCarRepository;
    }

    /*********************Car service : serviceid= 1******************/


    /**
     * @Route("/car_services", name="carServices")
     */
    public function index()
    {
        $user =  $this->getUser();
        $available = array();
        $company = $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]);
        $service = $this->serviceRepository->findOneby(['id' => 1]);
        if ($user->getCodeCompany() != null) {
            $availabilitiesByService = $this->availabilityRepository->avaiblabilityByService($service, $company);
        } else {
            $availabilitiesByService = $this->availabilityRepository->avaiblabilityByServicePublique($service);
        }

        $nextAvailable = array();
        $arrayofCategory = array();
        foreach ($availabilitiesByService as $availability) {
            $heuredeb = explode(":", $availability->getDebut());
            $heurefin = explode(":", $availability->getFin());

            $minutesdeb = ($heuredeb[0] * 60) + $heuredeb[1];
            $minutesfin = ($heurefin[0] * 60) + $heurefin[1];

            $duration = $minutesfin - $minutesdeb; //difference between available

            $planned = $this->plannedCleaningRepository->findBy(['Provider' => $availability->getProvider(), 'date' => $availability->getDate(), 'parkingId' => $availability->getParking(), 'valide' => null, 'supprime' => null]);
            $currentduration = 0;
            foreach ($planned as $plan) {
                $currentduration += $plan->getDuration();
            }

            $events = $this->calculEvent($availability, 75);
            if ($events != null) {
                if (($currentduration + 90) <= $duration) {
                    $providerid =  $availability->getProvider();
                    $parkingid = $availability->getParking();
                    $providerCat = $this->categoryProviderRepository->findBy(['id_provider' => $providerid]);
                    $parkingCat = $this->categoryLocationRepository->findBy(['id_location' => $parkingid]);
                    foreach ($providerCat as $categoryOfProvider) {

                        $idOfProviderCat = $categoryOfProvider->getIdCategory();
                        //  foreach ($parkingCat as $categoryOfLocation) {
                        //  $idOfLocationCat = $categoryOfLocation->getCategory();
                        //   if ($idOfProviderCat == $idOfLocationCat) {
                        array_push($available, $availability);
                        $product = $this->categoryProductRepository->FindProductByCat($idOfProviderCat, $availability->getProvider());
                        if ($product != null) {
                            array_push($arrayofCategory, $idOfProviderCat);
                        }
                        //  }
                        //  }
                    }
                }
                array_push($nextAvailable, [$availability, 'start' => $events[0]['start']]);
            }
        }

        $unique = array_map("unserialize", array_unique(array_map("serialize", $arrayofCategory)));
        $categories = $this->categoriesRepository->findBy(['id' => $unique]);

        return $this->render('car_services/index.html.twig', [
            'myCategories' => $categories,
            'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
            'availabilities' => $available,
            'nextAvailable' => $nextAvailable,
            'creditCard' => $this->creditCardRepository->findBy(['customerId' => $user]),
            'planned_cleanings' => $this->plannedCleaningRepository->findBy(['userid' => $user, 'valide' => null, 'supprime' => null], ['date' => 'ASC']),
            'car' => $this->mooveeUserHasCarRepository->findBy(['user_has_car_id_user' => $user, 'is_deleted' => null])
        ]);
    }

    /**
     * @Route("/carservice/{id}", name="carservice")
     */
    public function carcleaning(Request $request, $id)
    {
        $user = $this->getUser();
        $service = $this->categoriesRepository->findOneBy(['id' => $id]);
        $company = $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]);
        $availabilitiesByService = $this->availabilityRepository->avaiblabilityByServiceZ($service, $company);

        $availabilities = $this->availabilityRepository->findIncomingByServiceNeedCar($company, $id, 1);



        return $this->render('car_services/carChoice.html.twig', [
            'UserHasCars' => $this->mooveeUserHasCarRepository->FindUserHasCarByUser($user),
            'creditCards' => $this->creditCardRepository->findBy(['customerId' => $user]),
            'availabilities' => $availabilities,
            'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
            'serviceId' => $id,
            'currentservice' => $service
        ]);
    }
    /**
     * @Route("/carproduct", name="product")
     */
    public function myproduct(Request $request)
    {
        $query  = explode('&', $_SERVER['QUERY_STRING']);
        $params = array();
        $allproducts = array();

        foreach ($query as $param) {
            if (strpos($param, '=') === false) $param += '=';
            list($name, $value) = explode('=', $param, 2);
            $params[urldecode($name)][] = urldecode($value);
        }

        $user = $this->getUser();
        $car = $this->mooveeUserHasCarRepository->findOneBy(['id' => $_GET['userhascarid'], "is_deleted" => null]);
        $catCar = $car->getUserHasCarIdCar()->getCategoryCar();
        $availabilities = "";
        foreach ($params['availability'] as $id) {
            $availabilities = $this->availabilityRepository->findOneBy(['id' => $id, "is_deleted" => 0]);

            $product = $this->categoryProductRepository->FindProductByProviderCarCategory($availabilities->getProvider(), $catCar);


            array_push($allproducts, $product);
        }
        $allproducts = array_map("unserialize", array_unique(array_map("serialize", $allproducts)));
        $allproducts = call_user_func_array('array_merge', $allproducts);


        return $this->render('car_services/productChoice.html.twig', [
            'UserHasCars' => $this->mooveeUserHasCarRepository->FindUserHasCarByUser($user),
            'creditCards' => $this->creditCardRepository->findBy(['customerId' => $user]),
            'car' => $car,
            'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
            'availabilities' => $availabilities,
            'products' => $allproducts,
            'serviceid' => implode('|', $params['serviceid'])

        ]);
    }
    /**
     * @Route("/service/{id}/product", name="serviceproduct")
     */
    public function product(Request $request, $id)
    {

        $user = $this->getUser();
        $allproducts = array();
        $service = $this->categoriesRepository->findOneBy(['id' => $id]);
        $company = $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]);

        $availabilities = $this->availabilityRepository->findIncomingByServiceNoNeedCar($company, $id, 1);

        foreach ($availabilities as $avaible) {
            $product = $this->categoryProductRepository->FindProductByCat($id, $avaible->getProvider());
            foreach ($product as $p) {
                $p->getIdproduct()->getPhoto();
            }
            array_push($allproducts, $product);
        }
        $allproducts = array_map("unserialize", array_unique(array_map("serialize", $allproducts)));
        $allproducts = call_user_func_array('array_merge', $allproducts);

        return $this->render('car_services/productChoice.html.twig', [
            'creditCards' => $this->creditCardRepository->findBy(['customerId' => $user]),
            'availabilities' => $availabilities,
            'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
            'products' => $allproducts,
            'serviceid' => $id,
            'car' => null

        ]);
    }
    /**
     * @Route("/{serviceid}/productid/{id}", name="option")
     */
    public function options(Request $request, $serviceid, $id)

    {
        $user = $this->getUser();
        $categoryOptions = array();
        $numbersOfOptions = 0;
        $carId = "";
        $avaible = array();
        try {

            if (isset($_POST['carid'])) {
                $car = $this->mooveeUserHasCarRepository->findOneBy(['id' => $_POST['carid'], "is_deleted" => null]);
                $catCar = $car->getUserHasCarIdCar()->getCategoryCar();
                $availabilities = $this->availabilityRepository->avaibyproduct(['id_product' => $id], $user->getCodeCompany());
                $currentproduct = $this->categoryProductRepository->findOneBy(['id_product' => $id, 'category' => $catCar]);

                $myoption = $this->optionRepository->findBy(['id_product' => $id, 'supprime' => null]);
                foreach ($myoption as $option) {
                    $categoryOption = $this->categoryOptionRepository->findBy(['id_option' => $option->getId(), 'category' => $catCar]);
                    array_push($categoryOptions, $categoryOption);
                }

                $carId = $_POST['carid'];
            } else {
                $availabilities = $this->availabilityRepository->avaibyproduct(['id_product' => $id], $user->getCodeCompany());
                $currentproduct = $this->categoryProductRepository->findOneBy(['id_product' => $id]);

                $myoption = $this->optionRepository->findBy(['id_product' => $id, 'supprime' => null]);
                foreach ($myoption as $option) {
                    $categoryOption = $this->categoryOptionRepository->findBy(['id_option' => $option->getId()]);
                    array_push($categoryOptions, $categoryOption);
                }

                $carId = null;
            }
            $numbersOfOptions = count($myoption);
            if ($categoryOptions != null) {
                return $this->render('car_services/optionChoice.html.twig', [
                    'options' => $categoryOptions,
                    'currentproduct' => $currentproduct,
                    'availabilities' => $availabilities,
                    'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
                    'numbersOfOptions' => $numbersOfOptions,
                    'serviceid' => $serviceid,
                    'carId' => $carId


                ]);
            } else {
                $duration = $currentproduct->getTime();
                $availabilities = $this->availabilityRepository->avaibyproduct($currentproduct->getIdProduct(), $user->getCodeCompany());

                foreach ($availabilities as $availability) {
                    $events = $this->calculEvent($availability, $duration);
                    if ($events != null) {
                        $location = $availability->getParking()->getCompany();
                        if ($location != null) {
                            array_push($avaible, ['parking' => $availability->getParking(), 'photo'  => $availability->getParking()->getCompany()->getPhoto()]);
                        }
                    }
                }
                $avaible = array_map("unserialize", array_unique(array_map("serialize", $avaible)));

                foreach ($availabilities as $availability) {
                    $events = $this->calculEvent($availability, $duration);
                    if ($events != null) {
                        $location = $availability->getParking()->getCompany();
                        if ($location == null) {

                            array_push($avaible, ['parking' => $availability->getParking()]);
                        }
                    }
                }
                $avaible = array_map("unserialize", array_unique(array_map("serialize", $avaible)));

                return $this->render('car_services/locationchoice.html.twig', [
                    'carId' => $carId,
                    'options' => $categoryOptions,
                    'catproduct' => $currentproduct->getId(),
                    'achat' => $currentproduct->getIdProduct()->getDirectBuy(),
                    'categoryproduct' => $currentproduct,
                    'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
                    'avaible' => $avaible,

                ]);
            }
        } catch (\Exception $e) {
            $this->addFlash('error', $e);
            return $this->redirectToRoute('carservice_carServices');
        }
    }

    /**
     * @Route("/{id}/location", name="locationchoice")
     */
    public function chooseLocation(Request $request, $id)
    {
        $user = $this->getUser();
        $duration = 0;
        $durationOption = 0;
        $categoryoptions = "";
        $avaible = array();

        try {
            if (!empty($_POST['val'])) {
                $categoryoptions = $_POST['val'];
                foreach ($categoryoptions as $categoryoption) {
                    $categoryOption = $this->categoryOptionRepository->findOneBy(['id' => $categoryoption]);
                    $durationOption += $categoryOption->getTime();
                }
            }
            $categoryProduct = $this->categoryProductRepository->findOneBy(['id' => $id]);
            $duration = $categoryProduct->getTime() + $durationOption;
            $availabilities = $this->availabilityRepository->avaibyproduct($categoryProduct->getIdProduct(), $user->getCodeCompany());
            foreach ($availabilities as $availability) {
                $events = $this->calculEvent($availability, $duration);
                if ($events != null) {
                    $location = $availability->getParking()->getCompany();
                    if ($location != null) {
                        array_push($avaible, ['parking' => $availability->getParking(), 'photo'  => $availability->getParking()->getCompany()->getPhoto()]);
                    }
                }
            }
            $avaible = array_map("unserialize", array_unique(array_map("serialize", $avaible)));

            foreach ($availabilities as $availability) {
                $events = $this->calculEvent($availability, $duration);
                if ($events != null) {
                    $location = $availability->getParking()->getCompany();
                    if ($location == null) {

                        array_push($avaible, ['parking' => $availability->getParking()]);
                    }
                }
            }
            $avaible = array_map("unserialize", array_unique(array_map("serialize", $avaible)));


            if (isset($_POST['carId'])) {
                $carid = $_POST['carId'];
            } else {
                $carid = null;
            }

            return $this->render('car_services/locationchoice.html.twig', [
                'duration' => $categoryProduct->getTime(),
                'carId' => $carid,
                'options' => $categoryoptions,
                'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
                'catproduct' => $id,
                'achat' => $categoryProduct->getIdProduct()->getDirectBuy(),
                'categoryproduct' => $categoryProduct,
                'avaible' => $avaible,

            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e);
            return $this->redirectToRoute('carservice_carServices');
        }
    }
    /**
     * @Route("/location/availbledate", name="availbleDate")
     */
    public function chooseDate(Request $request)
    {
        $user = $this->getUser();
        $options = array();
        $duration = 0;
        $durationOption = 0;
        $directAvailability = array();
        $categoryOption = "";
        $categoryOptions = array();

        try {
            if (!empty($_POST['val'])) {
                $options = $_POST['val'];

                foreach ($options as $optionid) {
                    $option = $this->optionRepository->findOneBy(["id" => $optionid]);
                    $categoryOption = $this->categoryOptionRepository->findBy(['id' => $optionid]);
                    foreach ($categoryOption as $catop) {
                        $durationOption += $catop->getTime();
                    }
                    array_push($categoryOptions, $categoryOption);
                }
            }



            $idparking = $_POST['parking'];
            $currentparking = $this->parkingsRepository->findOneBy(['id' => $idparking]);
            $categoryProduct = $this->categoryProductRepository->findOneBy(['id' => $_POST['catproduct_id']]);
            $duration = $categoryProduct->getTime() + $durationOption;
            $availabilities = $this->availabilityRepository->avaibyproductParking($categoryProduct->getIdProduct(), $user->getCodeCompany(), $idparking);

            foreach ($availabilities as $availability) {
                $events = $this->calculEvent($availability, $duration);
                if ($events != null) {
                    array_push($directAvailability, [$availability, 'start' => $events[0]['start'], 'end' => $events[0]['end']]);
                }
            }
            $images = $currentparking->getPhotosParkings();
            $image = "";
            if ($images != null) {
                $image = $images[0];
                if ($image != null) {
                    $image = $image->getName();
                }
            }

            return $this->render('car_services/datechoice.html.twig', [
                'duration' => $categoryProduct->getTime(),
                'carId' => $_POST['carId'],
                'achat' => $categoryProduct->getIdProduct()->getDirectBuy(),
                'categoryproduct' => $categoryProduct,
                'catproduct' => $_POST['catproduct_id'],
                'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
                'options' => $categoryOptions,
                'directAvailabilities' => $directAvailability,
                'currentparking' => $currentparking,
                'image' => $image



            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e);
            return $this->redirectToRoute('carservice_carServices');
        }
    }



    /**
     * @Route("/option/calendar", name="calendar")
     */
    public function mycalendar()
    {

        $user = $this->getUser();
        $product = 0;
        $options = array();
        $duration = 0;
        $durationOption = 0;
        $res = array();

        //  try {
        if (!empty($_POST['val'])) {
            // loop to retrieve checked values
            $options = $_POST['val'];
            foreach ($_POST['val'] as $optionid) {
                $categoryOption = $this->categoryOptionRepository->findBy(['id' => $optionid]);
                foreach ($categoryOption as $catop) {
                    $optionId = $catop->getIdOption()->getId();
                    $option = $this->optionRepository->findOneBy(["id" => $optionId]);

                    $product = $option->getIdProduct();
                    $durationOption += $catop->getTime();
                }
            }
        }


        $idparking = $_POST['parking'];
        $categoryProduct = $this->categoryProductRepository->findOneBy(['id' => $_POST['catproduct_id']]);
        $product = $categoryProduct->getIdProduct()->getId();

        $duration = $categoryProduct->getTime() + $durationOption;
        $availabilities = $this->availabilityRepository->avaibyproductParking($categoryProduct->getIdProduct(), $user->getCodeCompany(), $idparking);
        $test = new DateTime('tomorrow');
        $tomorrow = $test->format('Y/m/d');

        foreach ($availabilities as $k => $a) {
            $day = $a->getDate()->format('Y/m/d');
            if ($day <= $tomorrow) {
                unset($availabilities[$k]);
            }
        }

        foreach ($availabilities as $availability) {
            $events = $this->calculEvent($availability, $duration);
            if ($events != null) {
                array_push($res, [$availability, $events]);
            }
        }


        foreach ($res as $r) {
            foreach ($r as $s) {
                foreach ($s as $a) {
                }
            }
        }
        return $this->render('car_services/mycalendar.html.twig', [
            'product' => $product,
            'duration' => $categoryProduct->getTime(),
            'availabilities' => $availabilities,
            'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
            'res' => $res,
            'options' => $options,
            'carId' => $_POST['carId'],

        ]);
        //  } catch (\Exception $e) {
        //  $this->addFlash('error', $e);
        // return $this->redirectToRoute('carservice_carServices');
        // }
    }
    /**
     * @Route("/order/resume", name="resumedirect")
     */
    public function resumeDirect(Request $request)
    {
        $user = $this->getUser();
        $priceTotal = 0;
        $priceOption = 0;
        $durationOption = 0;
        $idavailability = 0;
        $options = array();
        $categoryOption = "";
        $availability = "";
        $categoryOptions = array();
        $duration = 0;

        try {
            /****************** reduction ***********************/
            if ($request->request->get('reduction')) {

                $reduction = $this->reductionRepository->findOneBy(['code' => $request->request->get('reduction'), 'utilise' => null]);

                if ($reduction) {
                    $verify = "<b>" . $reduction->getReduction() . "€ Discount</b>";
                    $code = $reduction->getId();
                } else {
                    $verify = "<b style='color: red'>The code you entered does not exist !</b>";
                    $code = null;
                }
                $arrData = ['verify' => $verify, 'code' => $code];
                return new JsonResponse($arrData);
            }



            /****************** options ***********************/
            if (!empty($_POST['val'])) {
                // loop to retrieve checked values
                $car = $this->mooveeUserHasCarRepository->findOneBy(['id' => $_POST['carId'], "is_deleted" => null]);

                foreach ($_POST['val'] as $optionId) {
                    $categoryOption = $this->categoryOptionRepository->findBy(['id' => $optionId]);
                    foreach ($categoryOption as $catop) {
                        $optionId = $catop->getIdOption()->getId();
                        $option = $this->optionRepository->findOneBy(["id" => $optionId]);

                        $priceOption += $catop->getPrice();
                        $durationOption += $catop->getTime();
                        array_push($categoryOptions, $catop);
                    }
                    array_push($options, $option);
                }
            }
            $values = explode(",", $_POST['availability']);
            $idavailability = $values[0];

            $startTime = $values[1];

            /****************** product ***********************/
            $user_has_car = $this->mooveeUserHasCarRepository->findOneBy(['id' => $_POST['carId']]);

            if ($user_has_car != null) {

                $categoryProduct = $this->categoryProductRepository->findOneBy(['id_product' => $_POST['product_id'], 'category' => $user_has_car->getUserHasCarIdCar()->getCategoryCar()]);
            } else {
                $categoryProduct = $this->categoryProductRepository->findOneBy(['id_product' => $_POST['product_id']]);
            }
            /****************** availability ***********************/
            $availability = $this->availabilityRepository->findOneBy(['id' => $idavailability]);


            /****************** calculate time of order ***********************/

            $heuredeb = explode(":", $startTime);
            $plannedStart = ($heuredeb[0] * 60) + $heuredeb[1];
            $planned = $this->plannedCleaningRepository->findBy(['date' => $availability->getDate(), 'parkingId' => $availability->getParking(), "Provider" => $availability->getProvider(), "supprime" => null]);
            $duration = $categoryProduct->getTime() + $durationOption;

            $plannedEnd = $plannedStart + $duration;

            $minstart = "";
            if ($plannedStart % 60 < 10) {
                $minstart = "0";
            }
            $minstart .= $plannedStart % 60;

            $minend = "";
            if ($plannedEnd % 60 < 10) {
                $minend = "0";
            }
            $minend .= $plannedEnd % 60;

            $priceTotal = $priceOption + $categoryProduct->getPrice();
            $vat = 0.17 * $priceTotal;

            $start = floor($plannedStart / 60) . ':' . $minstart;
            $end = floor($plannedEnd / 60) . ':' . $minend;


            return $this->render('car_services/eventResume.html.twig', [
                'categoryProduct' => $categoryProduct,
                'options' => $options,
                'product' => $this->productsRepository->findOneBy(['id' => $_POST['product_id']]),
                'priceTotal' => $priceTotal,
                'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
                'categoryOption' => $categoryOptions,
                'parking' => $availability->getParking(),
                'date' => $availability->getDate()->format('d/m/Y'),
                'start' => $start,
                'end' => $end,
                'vat' => $vat,
                'availability' => $availability,
                'car' => $user_has_car

            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e);
            return $this->redirectToRoute('carservice_carServices');
        }
    }


    /**
     * @Route("/calendar/resume", name="resume")
     */
    public function orderResume(Request $request)
    {
        $query  = explode('&', $_SERVER['QUERY_STRING']);
        $user = $this->getUser();
        $params = array();
        $categoryOption = "";
        $priceTotal = 0;
        $priceOption = 0;
        $options = array();
        $categoryOption = "";
        $availability = "";
        $categoryOptions = array();
        try {
            //check reduction
            if ($request->request->get('reduction')) {

                $reduction = $this->reductionRepository->findOneBy(['code' => $request->request->get('reduction'), 'utilise' => null]);

                if ($reduction) {
                    $verify = "<b>" . $reduction->getReduction() . "€ Discount</b>";
                    $code = $reduction->getId();
                } else {
                    $verify = "<b style='color: red'>The code you entered does not exist !</b>";
                    $code = null;
                }
                $arrData = ['verify' => $verify, 'code' => $code];
                return new JsonResponse($arrData);
            }

            foreach ($query as $param) {
                if (strpos($param, '=') === false) $param += '=';
                list($name, $value) = explode('=', $param, 2);
                $params[urldecode($name)][] = urldecode($value);
            }

            $date =  implode("|", $params['date']);
            $start = implode("|", $params['start']);
            $end = implode("|", $params['end']);
            $car = $this->mooveeUserHasCarRepository->findOneBy(['id' => $params['carid'], "is_deleted" => null]);

            if ($car != null) {
                $catCar = $car->getUserHasCarIdCar()->getCategoryCar();
                $categoryProduct = $this->categoryProductRepository->findOneBy(['id_product' => $params['product'], "category" => $catCar]);
                $user_has_car = $this->mooveeUserHasCarRepository->findOneBy(['id' => $params['carid']]);
            } else {
                $categoryProduct = $this->categoryProductRepository->findOneBy(['id_product' => $params['product']]);
                $user_has_car = null;
            }

            if (array_key_exists("options", $params)) {
                foreach ($params['options'] as $optionId) {
                    $categoryOption = $this->categoryOptionRepository->findBy(['id' => $optionId]);
                    foreach ($categoryOption as $catop) {
                        $optionId = $catop->getIdOption()->getId();
                        $option = $this->optionRepository->findOneBy(["id" => $optionId]);

                        array_push($options, $option);
                        $priceOption += $catop->getPrice();
                        $durationOption = $catop->getTime();
                    }
                    array_push($categoryOptions, $catop);
                }
            }


            $availability = $this->availabilityRepository->findOneBy(['id' => implode("|", $params['id'])]);

            $priceTotal = $priceOption + $categoryProduct->getPrice();
            $vat = 0.17 * $priceTotal;


            return $this->render('car_services/eventResume.html.twig', [
                'product' => $this->productsRepository->findOneBy(['id' => $params['product']]),
                'options' => $options,
                'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
                'categoryProduct' => $categoryProduct,
                'categoryOption' => $categoryOptions,
                'priceTotal' => $priceTotal,
                'date' => $date,
                'end' => $end,
                'start' => $start,
                'parking' => $this->parkingsRepository->findOneBy(['id' => $params['parking']]),
                'vat' => $vat,
                'availability' => $availability,
                'car' => $user_has_car
            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e);
            return $this->redirectToRoute('carservice_carServices');
        }
    }



    /**
     * @Route("Payment", name="payment")
     */
    public function paiment(Request $request)
    {

        if ($request->getMethod() == 'POST') {

            $user = $this->getUser();
            $plannedcleaning = new PlannedCleaning();
            //user car
            if ($request->request->get('carid') != null) {
                $voiture = $this->mooveeUserHasCarRepository->findOneBy(['id' => $request->request->get('carid')]);
            } else {
                $voiture = null;
            }
            //user choosed date
            $availability = $this->availabilityRepository->findOneBy(['id' => $request->request->get('availability')]);
            $duration = 0;
            $price = 0;
            //user choosed product
            $product = $this->categoryProductRepository->findOneBy(['id' => $request->request->get('product_id')]);

            //product time
            $duration = $duration + $product->getTime();
            //product orice
            $price = $price + $product->getPrice();

            $options = array();
            $categoryOptions = array();
            $opts = array();
            if (isset($_POST['options'])) {
                foreach ($_POST['options'] as $idop) {
                    $categoryOption = $this->categoryOptionRepository->findOneBy(['id' => $idop]);
                    //   foreach ($categoryOption as $catop) {
                    $optionId = $categoryOption->getIdOption()->getId();
                    $option = $this->optionRepository->findOneBy(["id" => $optionId]);
                    array_push($categoryOptions, $categoryOption);
                    array_push($options, $option);
                    array_push($opts, $option->getName());
                    // }
                    $price = $price + $categoryOption->getPrice();
                }
            }
            $start  = date("H:i", strtotime($request->request->get('start')));
            $end = date("H:i", strtotime($request->request->get('end')));
            $starth = explode(":", $start);
            $startm = ($starth[0] * 60) + $starth[1];

            $endh = explode(":", $end);
            $endm = ($endh[0] * 60) + $endh[1];

            $plannedStart = $startm;
            $plannedEnd = $endm;

            $usedReduction = null;
            $reduction = new Reduction();
            if (($_POST['validate_discount']) != "") {
                $reduction = $this->reductionRepository->findOneBy(['id' => $_POST['validate_discount']]);
                $price = $price - $reduction->getReduction();


                if ($price < 0) {
                    $price = 0;
                }
            }
            $time = $this->calculeFromTo($plannedStart, $plannedEnd);
            $creditCards = $this->creditCardRepository->findBy(['customerId' => $user]);
            $startEvent = $availability->getDate()->format('Ymd') . $time[0][0];
            $endEvent = $availability->getDate()->format('Ymd') . $time[0][1];
            $sEvent = new DateTime($startEvent);
            $eEvent = new DateTime($endEvent);
            $icsDocument = $this->iscFile($sEvent->format('Ymd\THis'), $eEvent->format('Ymd\THis'),  $product->getIdProduct()->getDescription(), $product->getIdProduct()->getName(), $availability->getParking()->getAddress());


            if ($price == 0) {
                if ($reduction != null) {
                    $reduction->setUtilise('1');
                    $usedReduction = $reduction->getId();
                } else {
                    $usedReduction = null;
                }


                $facture = "INV_GS_" . date_format($availability->getDate(), 'Ym') . '000' . $plannedcleaning->getId();
                $plannedcleaning = $this->newPlannedService(
                    $user,
                    $availability->getParking(),
                    $voiture,
                    'am',
                    $availability->getDate(),
                    "aucun",
                    $duration,
                    $plannedStart,
                    $plannedEnd,
                    $price,
                    $product->getIdProduct(),
                    $product->getIdProduct()->getIdProvider(),
                    $facture,
                    null,
                    $usedReduction,
                    null,
                    null,
                    null,
                    null
                );
                $dateOfService = $availability->getDate()->format('m-d-Y') . ' - ' . $time[0][0] . " to " . $time[0][1];
                $this->categoryCleanignOptions($categoryOptions, $plannedcleaning);
                if ($voiture != null) {
                    $carname = $this->mooveeCarRepository->findOneBy(['id' => $voiture->getUserHasCarIdCar()]);
                    $carbrand = $carname->getBrandCar() . "/" . $carname->getModelCar();
                    $immat = $voiture->getUserHasCarNicknameCar();
                } else {
                    $carbrand = null;
                    $immat = null;
                }

                $message = new ReponseMail();
                $messagePro = new ReponseMail();
                $message->sendReservation($user->getEmail(), $plannedcleaning->getFacture(), $dateOfService, $plannedcleaning->getProduit()->getName(), $plannedcleaning->getProduit()->getOption(), number_format($price, 2, ' . ', ', '), $icsDocument);
                $provider = $this->mooveeUsersRepository->findAdminWorkerByProvider($availability->getProvider());
                $orderUser = $this->mooveeUsersRepository->findOneBy(['id' => $user->getId()]);
                $mvuser = $orderUser->getFirstName() . " " . $orderUser->getLastName();
                $letitre = $plannedcleaning->getProduit()->getName() . "/" .  $availability->getParking()->getName();
                $lieu = $availability->getParking()->getName() . " " . $availability->getParking()->getAddress();

                $lecorps =
                    "Client : " . $mvuser .
                    "\\nEmail : " . $orderUser->getEmail() .
                    "\\nTéléphone : " . $orderUser->getPhoneNumber() .
                    "\\nBrand/Model : " . $carbrand .
                    "\\nImmatriculation : " . $immat .
                    "\\nProduit : " . $plannedcleaning->getProduit()->getName() .
                    "\\nOptions :" . implode('\n', $opts) .
                    "\\nTarif : " . number_format($price, 2, ' . ', ', ') .
                    "\\nLieu : " . $availability->getParking()->getName() . " " . $availability->getParking()->getAddress();

                $icsDocumentProvider = $this->iscFile($sEvent->format('Ymd\THis'), $eEvent->format('Ymd\THis'), $lecorps, $letitre,  $lieu);

                foreach ($provider as $p) {
                    $messagePro->sendMailDirectToProvider($p->getEmail(), $mvuser, $dateOfService, $availability->getParking()->getName(), $plannedcleaning->getProduit()->getName(), $plannedcleaning->getProduit()->getOption(), $icsDocumentProvider);
                }

                // $reduction = $this->reductionRepository->findOneBy(['id' => $request->request->get('availability')]);
                return $this->redirectToRoute("cms_dashboard");
            } else {
                $decimal = round(($price - floor($price)) * 100, 0);
                if ($decimal == 0)
                    $decimal = 100;
                return $this->render('car_services/payment.html.twig', [
                    'user' => $user,
                    'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
                    'car' => $voiture,
                    'creditCards' => $creditCards,
                    'product' => $this->productsRepository->findOneBy(['id' => $product->getIdProduct()]),
                    'options' => $options,
                    'categoryProduct' => $product,
                    'categoryOption' => $categoryOptions,
                    'price' => $price,
                    'decimal' => $decimal,
                    'availability' => $availability,
                    'end' => $plannedEnd,
                    'start' => $plannedStart,
                    'parking' => $availability->getParking(),
                    'duration' => $duration,
                    'usedReduction' => $usedReduction
                ]);
            }
        }
    }

    /**
     * @Route("/Payment/{price}/{decimal}", name="savedcard")
     */
    public function payWithSavedCard(Request $request, int $price, int $decimal)
    {
        if ($request->getMethod() == 'POST') {
            $price += ($decimal % 100) / 100;
            $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();

            \Stripe\Stripe::setApiKey($this->getParameter('private_key_stripe'));


            $categoryOptions = array();


            $availability = $this->availabilityRepository->findOneBy(['id' => $request->request->get('availability')]);
            $product = $this->categoryProductRepository->findOneBy(['id' => $request->request->get('product_id')]);
            $creditCards = $this->creditCardRepository->findOneBy(['id' => $_POST['creditCard']]);

            /*   if ($request->request->get('availability') != null) {
                         $reduction = $this->reductionRepository->findOneBy(['id' => $request->request->get('availability')]);
                         if ($reduction != null) {
                             $reduction->setUtilise('1');
                         }
                     }*/

            if (isset($_POST['options'])) {
                foreach ($_POST['options'] as $idop) {
                    $categoryOption = $this->categoryOptionRepository->findOneBy(['id' => $idop]);
                    foreach ($categoryOption as $catop) {
                        array_push($categoryOptions, $catop);
                    }
                }
            }
            $opts = array();
            if (isset($_POST['opt'])) {
                foreach ($_POST['opt'] as $opt) {
                    array_push($opts, $opt);
                }
            }
            if ($request->request->get('carid') != null) {
                $voiture = $this->mooveeUserHasCarRepository->findOneBy(['id' => $request->request->get('carid')]);
                $cat = $voiture->getUserHasCarIdCar()->getCategoryCar();
            } else {
                $voiture = null;
            }

            $from = $request->request->get('start');
            $to = $request->request->get('end');
            $duration = $request->request->get('duration');
            $usedReduction = $request->request->get('usedReduction');

            $time = $this->calculeFromTo($from, $to);
            $plannedcleaning = $this->newPlannedService(
                $user,
                $availability->getParking(),
                $voiture,
                'am',
                $availability->getDate(),
                "aucun",
                $duration,
                $from,
                $to,
                $price,
                $product->getIdProduct(),
                $product->getIdProduct()->getIdProvider(),
                null,
                $usedReduction
            );
            $dateOfService = $availability->getDate()->format('m-d-Y') . ' - ' . $time[0][0] . " to " . $time[0][1];
            $startEvent = $availability->getDate()->format('Ymd') . $time[0][0];
            $endEvent = $availability->getDate()->format('Ymd') . $time[0][1];
            $sEvent = new DateTime($startEvent);
            $eEvent = new DateTime($endEvent);
            $icsDocument = $this->iscFile($sEvent->format('Ymd\THis'), $eEvent->format('Ymd\THis'), $product->getIdProduct()->getDescription(),  $product->getIdProduct()->getName(), $availability->getParking()->getAddress());


            $this->categoryCleanignOptions($categoryOptions, $plannedcleaning);
            $orderUser = $this->mooveeUsersRepository->findOneBy(['id' => $user->getId()]);
            $mvuser = $orderUser->getFirstName() . " " . $orderUser->getLastName();

            if ($voiture != null) {
                $immat = $voiture->getUserHasCarNicknameCar();
                $carname = $this->mooveeCarRepository->findOneBy(['id' => $voiture->getUserHasCarIdCar()]);
                $carbrand = $carname->getBrandCar() . "/" . $carname->getModelCar();
            } else {
                $immat = null;
                $carbrand = null;
            }
            if ($voiture != null) {
            }
            $letitre = $plannedcleaning->getProduit()->getName() . "/" .  $availability->getParking()->getName();
            $lieu = $availability->getParking()->getName() . " " . $availability->getParking()->getAddress();
            $lecorps =
                "Client : " . $mvuser .
                "\\nEmail : " . $orderUser->getEmail() .
                "\\nTéléphone : " . $orderUser->getPhoneNumber() .
                "\\nImmatriculation : " . $immat .
                "\\nBrand/Model : " . $carbrand .
                "\\nProduit : " . $plannedcleaning->getProduit()->getName() .
                "\\nOptions :" . implode('\n', $opts) .
                "\\nTarif : " . number_format($price, 2, ' . ', ', ') .
                "\\nLieu : " . $availability->getParking()->getName() . " " . $availability->getParking()->getAddress();
            $icsDocumentProvider = $this->iscFile($sEvent->format('Ymd\THis'), $eEvent->format('Ymd\THis'), $lecorps, $letitre,  $lieu);
            $providerName = $availability->getProvider()->getName();

            if ($product->getIdProduct()->getDirectBuy() == true || $product->getIdProduct()->getAutoValide() == true) {
                /*************************************** Call methode paymentIntentDirect  ***************************************************/
                $intent = $this->paymentIntentDirect($plannedcleaning, $price, $user->getCustomerToken(), $creditCards->getCardToken(), $providerName);
                //create a facture
                $facture = "INV_GS_" . date_format($availability->getDate(), 'Ym') . '000' . $plannedcleaning->getId();
                /*************************************** Update planned cleaning ***************************************************/
                $plannedcleaning->setTransactionToken($intent->id);
                $plannedcleaning->setFacture($facture);
                $em->persist($plannedcleaning);
                $em->flush();
                /************************************* Message *****************************************************/
                $provider = $this->mooveeUsersRepository->findAdminWorkerByProvider($availability->getProvider());

                $message = new ReponseMail();
                $messagePro = new ReponseMail();
                //toUser
                $message->sendReservation($plannedcleaning->getUserId()->getEmail(), $facture, $dateOfService, $plannedcleaning->getProduit()->getName(), $plannedcleaning->getProduit()->getOption(), number_format($price, 2, ' . ', ', '), $icsDocument);
                //toProvider
                foreach ($provider as $p) {
                    $messagePro->sendMailDirectToProvider($p->getEmail(), $mvuser, $dateOfService, $availability->getParking()->getName(), $plannedcleaning->getProduit()->getName(), $plannedcleaning->getProduit()->getOption(), $icsDocumentProvider);
                }
                $path = $this->getParameter('app_path') . "/app/public/valide/" . $plannedcleaning->getId();
                $url = filter_var($path, FILTER_SANITIZE_URL);

                return $this->redirect($url, 301);
            } else {

                /*************************************** Call methode paymentIntentDirect  ***************************************************/
                $intent = $this->paymentIntentIndirect($plannedcleaning, $price, $user->getCustomerToken(), $creditCards->getCardToken(), $providerName);

                /*************************************** Update planned cleaning ***************************************************/
                $plannedcleaning->setFacture("INV_GS_" . date_format($availability->getDate(), 'Ym') . '000' . $plannedcleaning->getId());
                $plannedcleaning->setTransactionToken($intent->id);
                $plannedcleaning->setCapture(1);
                $plannedcleaning->setValide(1);
                $em->persist($plannedcleaning);
                $em->flush();

                /************************************* Message *****************************************************/
                $provider = $this->mooveeUsersRepository->findAdminWorkerByProvider($availability->getProvider());

                $message = new ReponseMail();
                $messagePro = new ReponseMail();
                //toProvider
                foreach ($provider as $p) {
                    $messagePro->sendMailDirectToProvider($p->getEmail(), $mvuser, $dateOfService, $availability->getParking()->getName(), $plannedcleaning->getProduit()->getName(), $plannedcleaning->getProduit()->getOption(), $icsDocumentProvider);
                }
                $message->sendReservationIndirect($plannedcleaning->getUserId()->getEmail(), $dateOfService, $plannedcleaning->getProduit()->getName(), $plannedcleaning->getProduit()->getOption(), number_format($price, 2, ' . ', ', '), $icsDocument);

                $path = $this->getParameter('app_path') . "/app/public/";
                $url = filter_var($path, FILTER_SANITIZE_URL);
                return $this->redirect($url, 301);
            }
        }
    }

    /**
     * @Route("/newPayment/{price}/{decimal}", name="newmethod")
     */
    public function payWithNewCard(Request $request, int $price, int $decimal)
    {
        if ($request->getMethod() == 'POST') {
            $price += ($decimal % 100) / 100;
            $user = $this->getUser();
            $em = $this->getDoctrine()->getManager();
            $categoryOptions = array();

            \Stripe\Stripe::setApiKey($this->getParameter('private_key_stripe'));


            $card = new CreditCard();
            $token = $_POST['stripeToken'];

            $availability = $this->availabilityRepository->findOneBy(['id' => $request->request->get('availability')]);
            $product = $this->categoryProductRepository->findOneBy(['id' => $request->request->get('product_id')]);
            /*if ($request->request->get('availability') != null) {
                 $reduction = $this->reductionRepository->findOneBy(['id' => $request->request->get('availability')]);
                 if ($reduction != null) {
                     $reduction->setUtilise('1');
                 }
             }*/
            if (isset($_POST['options'])) {
                foreach ($_POST['options'] as $idop) {
                    $categoryOption = $this->categoryOptionRepository->findOneBy(['id' => $idop]);
                    foreach ($categoryOption as $catop) {
                        array_push($categoryOptions, $catop);
                    }
                }
            }
            $opts = array();
            if (isset($_POST['opt'])) {
                foreach ($_POST['opt'] as $opt) {
                    array_push($opts, $opt);
                }
            }
            if ($request->request->get('carid') != null) {
                $voiture = $this->mooveeUserHasCarRepository->findOneBy(['id' => $request->request->get('carid')]);
            } else {
                $voiture = null;
            }
            $from = $request->request->get('start');
            $to = $request->request->get('end');
            $duration = $request->request->get('duration');
            $usedReduction = $request->request->get('usedReduction');

            $time = $this->calculeFromTo($from, $to);
            $plannedcleaning = $this->newPlannedService(
                $user,
                $availability->getParking(),
                $voiture,
                'am',
                $availability->getDate(),
                "aucun",
                $duration,
                $from,
                $to,
                $price,
                $product->getIdProduct(),
                $product->getIdProduct()->getIdProvider(),
                null,
                $usedReduction
            );
            try {
                $paymentmeth = \Stripe\PaymentMethod::retrieve($token);


                $customer = \Stripe\Customer::create([
                    'email' => $user->getEmail(),
                    'payment_method' => $paymentmeth->id

                ]);

                if (isset($_POST['savemycard'])) {

                    $creditCards = $this->creditCardRepository->findBy(['customerId' => $user]);
                    foreach ($creditCards as $c)
                        $em->remove($c);
                    $user->setCustomertoken($customer->id);
                    $em->persist($user);
                    $em->flush();

                    $card->setCustomerId($user);
                    $card->setCardType($paymentmeth->card->brand);
                    $card->setCardToken($paymentmeth->id);
                    $card->setLastDigits($paymentmeth->card->last4);
                    $card->setMonthValidity($paymentmeth->card->exp_month);
                    $card->setYearValidity($paymentmeth->card->exp_year);
                    $em->persist($card);
                    $em->flush();
                }
            } catch (\Stripe\Error\ApiConnection $e) {
                $this->addFlash('Network problem, perhaps try again', $e);
                return $this->redirectToRoute('carservice_carServices');
            } catch (\Stripe\Error\Api $e) {
                $this->addFlash("Stripe's servers are down!", $e);
                return $this->redirectToRoute('carservice_carServices');
            } catch (\Stripe\Error\Card $e) {
                $this->addFlash("Card was declined", $e);
                return $this->redirectToRoute('carservice_carServices');
            }
            $dateOfService = $availability->getDate()->format('m-d-Y') . ' - ' . $time[0][0] . " to " . $time[0][1];
            $startEvent = $availability->getDate()->format('Ymd') . $time[0][0];
            $endEvent = $availability->getDate()->format('Ymd') . $time[0][1];
            $sEvent = new DateTime($startEvent);
            $eEvent = new DateTime($endEvent);
            $icsDocument = $this->iscFile($sEvent->format('Ymd\THis'), $eEvent->format('Ymd\THis'), $product->getIdProduct()->getDescription(), $product->getIdProduct()->getName(),  $availability->getParking()->getAddress());

            $this->categoryCleanignOptions($categoryOptions, $plannedcleaning);
            $orderUser = $this->mooveeUsersRepository->findOneBy(['id' => $user->getId()]);
            $mvuser = $orderUser->getFirstName() . " " . $orderUser->getLastName();

            if ($voiture != null) {
                $carname = $this->mooveeCarRepository->findOneBy(['id' => $voiture->getUserHasCarIdCar()]);
                $carbrand = $carname->getBrandCar() . "/" . $carname->getModelCar();;
                $immat = $voiture->getUserHasCarNicknameCar();
            } else {

                $immat = null;
                $carbrand = null;
            }
            if ($voiture != null) {
            }
            $letitre = $plannedcleaning->getProduit()->getName() . "/" .  $availability->getParking()->getName();
            $lieu = $availability->getParking()->getName() . " " . $availability->getParking()->getAddress();
            $lecorps =
                "Client : " . $mvuser .
                "\\nEmail : " . $orderUser->getEmail() .
                "\\nTéléphone : " . $orderUser->getPhoneNumber() .
                "\\nBrand/Model : " . $carbrand .
                "\\nImmatriculation : " . $immat .
                "\\nProduit : " . $plannedcleaning->getProduit()->getName() .
                "\\nOptions :" . implode('\n', $opts) .
                "\\nTarif : " . number_format($price, 2, ' . ', ', ') .
                "\\nLieu : " . $availability->getParking()->getName() . " " . $availability->getParking()->getAddress();
            $icsDocumentProvider = $this->iscFile($sEvent->format('Ymd\THis'), $eEvent->format('Ymd\THis'), $lecorps, $letitre,  $lieu);
            $providerName = $availability->getProvider()->getName();

            if ($product->getIdProduct()->getDirectBuy() == true || $product->getIdProduct()->getAutoValide() == true) {

                /*************************************** Call methode paymentIntentDirect  ***************************************************/
                $intent = $this->paymentIntentDirect($plannedcleaning, $price, $customer->id, $paymentmeth->id, $providerName);

                $facture = "INV_GS_" . date_format($availability->getDate(), 'Ym') . '000' . $plannedcleaning->getId();

                /*************************************** Update planned cleaning ***************************************************/
                $plannedcleaning->setTransactionToken($intent->id);
                $plannedcleaning->setFacture($facture);
                $em->persist($plannedcleaning);
                $em->flush();

                /************************************* Message *****************************************************/
                $message = new ReponseMail();
                $messagePro = new ReponseMail();

                $message->sendReservation($plannedcleaning->getUserId()->getEmail(), $facture, $dateOfService, $plannedcleaning->getProduit()->getName(), $plannedcleaning->getProduit()->getOption(), number_format($price, 2, ' . ', ', '), $icsDocument);
                $provider = $this->mooveeUsersRepository->findAdminWorkerByProvider($availability->getProvider());
                foreach ($provider as $p) {
                    $messagePro->sendMailDirectToProvider($p->getEmail(), $mvuser, $dateOfService, $availability->getParking()->getName(), $plannedcleaning->getProduit()->getName(), $plannedcleaning->getProduit()->getOption(), $icsDocumentProvider);
                }
                $path = $this->getParameter('app_path') . "/app/public/valide/" . $plannedcleaning->getId();
                $url = filter_var($path, FILTER_SANITIZE_URL);
                return $this->redirect($url, 301);
            } else {
                /*************************************** Call methode paymentIntentDirect  ***************************************************/
                $intent = $this->paymentIntentIndirect($plannedcleaning, $price, $customer->id, $paymentmeth->id, $providerName);
                /*************************************** Update planned cleaning ***************************************************/
                $plannedcleaning->setFacture("INV_GS_" . date_format($availability->getDate(), 'Ym') . '000' . $plannedcleaning->getId());
                $plannedcleaning->setTransactionToken($intent->id);
                $plannedcleaning->setCapture(1);
                $plannedcleaning->setValide(1);
                $em->flush();
                /************************************* Message *****************************************************/
                $provider = $this->mooveeUsersRepository->findAdminWorkerByProvider($availability->getProvider());
                $message = new ReponseMail();
                $messagePro = new ReponseMail();

                foreach ($provider as $p) {
                    $messagePro->sendMailDirectToProvider($p->getEmail(), $mvuser, $dateOfService, $availability->getParking()->getName(), $plannedcleaning->getProduit()->getName(), $plannedcleaning->getProduit()->getOption(), $icsDocument);
                }
                $message->sendReservationIndirect($plannedcleaning->getUserId()->getEmail(), $dateOfService, $plannedcleaning->getProduit()->getName(), $plannedcleaning->getProduit()->getOption(), number_format($price, 2, ' . ', ', '), $icsDocumentProvider);

                $path = $this->getParameter('app_path') . "/app/public/";
                $url = filter_var($path, FILTER_SANITIZE_URL);
                return $this->redirect($url, 301);
            }

            $this->addFlash('success', 'Your service has been successfully planned');
            return $this->redirectToRoute("cms_dashboard");
        }
    }
    /**
     * @Route("valide/{id}", name="valide")
     */
    public function valide(Request $request, int $id)
    {

        $user = $this->getUser();

        $plannedcleaning = $this->plannedCleaningRepository->findOneBy(['id' => $id, 'userid' => $user->getId(), 'valide' => '1', "supprime" => null]);

        //TODO
        if ($plannedcleaning) {
            $em = $this->getDoctrine()->getManager();
            $facture = $plannedcleaning->getFacture();

            $laDate = $plannedcleaning->getDate();
            $from = $plannedcleaning->getPlannedStart();
            $to = $plannedcleaning->getPlannedEnd();

            $time = $this->calculeFromTo($from, $to);

            $dateOfService = $laDate->format('m-d-Y') . ' - ' . $time[0][0] . ' to ' . $time[0][1];
            $price = $plannedcleaning->getPricePaid();
            /********************************************* Google Calendar API *********************************************/
            $providers = $this->mooveeUsersRepository->findAdminWorkerByProvider($plannedcleaning->getProvider());
            $idEvent = preg_replace('/\s/', '', ($plannedcleaning->getId() . "" . strtolower($plannedcleaning->getParkingId()->getName())));
            // $startTime = $plannedcleaning->getDate()->format('Y-m-d') . " " . $hourStart;
            //$endTime = $plannedcleaning->getDate()->format('Y-m-d') . " " . $hourEnd;
            date_default_timezone_set('Europe/Luxembourg');

            if ($providers != null) {
                foreach ($providers as $provider) {
                    if ($provider->getGoogleToken() != false) {
                        $googleToken = $this->googleCalendarApiRepository->findOneBy(['iduser' => $provider->getId()]);
                        $googleCalendar = new CalendarGoogle();
                        $client = $googleCalendar->getClient();
                        $client->setAccessToken($googleToken->getToken());
                        $title =  'Reservation' . " " . $plannedcleaning->getParkingId()->getName();
                        //  $googleCalendar->addEvent($idEvent, $googleToken->getCalendarId(), $client, $title, $plannedcleaning->getParkingId()->getAddress(), date('Y-m-d\TH:i:sP', strtotime($startTime)), date('Y-m-d\TH:i:sP', strtotime($endTime)), "6");
                    }
                }
            }
            $user = $this->getUser();
            if ($user->getGoogleToken() != false) {
                $googleToken = $this->googleCalendarApiRepository->findOneBy(['iduser' => $user->getId()]);
                $googleCalendar = new CalendarGoogle();
                $client = $googleCalendar->getClient();
                $client->setAccessToken($googleToken->getToken());
                $title =  'Reservation' . " " . $plannedcleaning->getParkingId()->getName();
                //   $googleCalendar->addEvent($idEvent, $googleToken->getCalendarId(), $client, $title, $plannedcleaning->getParkingId()->getAddress(), date('Y-m-d\TH:i:sP', strtotime($startTime)), date('Y-m-d\TH:i:sP', strtotime($endTime)), "6");
            }

            /********************************************* Reduction *********************************************/
            $reduction = $this->reductionRepository->findOneBy(['id' => $plannedcleaning->getReduction()]);
            if ($reduction) {
                $reduction->setUtilise('1');
            }
            if ($plannedcleaning->getCapture() == null) {
                $plannedcleaning->setValide(null);
            } else {
                $plannedcleaning->setValide(1);
            }

            $em->flush();

            $this->addFlash('success', 'Your service has been successfully planned');
        }


        return $this->redirectToRoute("cms_dashboard");
    }


    function genererChaineAleatoire($longueur, $listeCar = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $chaine = '';
        $max = mb_strlen($listeCar, '8bit') - 1;
        for ($i = 0; $i < $longueur; ++$i) {
            $chaine .= $listeCar[random_int(0, $max)];
        }
        return $chaine;
    }
    /**
     * Methode to calculate the rest of availability for the calendar
     */

    function calculEvent($availability, $duration)
    {
        $allevents = array();
        $heuredeb = explode(":", $availability->getDebut());
        $minutesdeb = ($heuredeb[0] * 60) + $heuredeb[1];
        $heurefin = explode(":", $availability->getFin());
        $minutesfin = ($heurefin[0] * 60) + $heurefin[1];
        $res = array();
        $plannedTime = array();

        $plannedfin = $minutesdeb;
        $plannedStart = 0;
        $planned = $this->plannedCleaningRepository->findBy(['date' => $availability->getDate(), 'parkingId' => $availability->getParking(), "Provider" => $availability->getProvider(), 'supprime' => null]);

        //slots that are already ordered
        foreach ($planned as $p) {
            $st = $p->getPlannedStart();
            $et = $p->getPlannedEnd();
            $facture = $p->getFacture();
            if ($facture != null) {
                array_push($plannedTime, ['start' => $st, 'end' => $et]);
            }
        }


        $plannedStart = $plannedfin;
        while ($plannedfin <= $minutesfin) {
            $plannedStart = $plannedfin;
            $plannedfin = $plannedfin + $duration;
            foreach ($plannedTime as $plannedTim) {
                foreach ($plannedTime as $pCom) {
                    if ((($plannedfin < $plannedTim['start'] && $plannedTim['start'] < $plannedfin) || $plannedfin == $plannedTim['start']) ||
                        ($plannedTim['start'] < $plannedfin && $plannedfin < $plannedTim['end'])
                    ) {
                        $plannedStart = $plannedTim['end'];
                        $plannedfin = $plannedStart + $duration;
                        array_push($res, ['start' => $plannedStart, 'end' => $plannedfin]);
                    }
                }
            }

            array_push($res, ['start' => $plannedStart, 'end' => $plannedfin]);
        }
        foreach ($res as $k => $event) {
            foreach ($plannedTime as $pCom) {
                if ((($event['start'] < $pCom['start'] && $pCom['start'] < $event['end']) || ($event['start'] == $pCom['start'] || $pCom['start'] == $event['end'])) ||
                    ($pCom['start'] < $event['start'] && $event['start'] < $pCom['end'])
                ) {
                    unset($res[$k]);
                }
            }
        }
        foreach ($res as $k => $event) {
            $time = $this->calculeFromTo($event['start'], $event['end']);
            array_push($allevents, ['start' => $time[0][0], 'end' => $time[0][1]]);
        }

        $unique = array();
        $unique = array_map("unserialize", array_unique(array_map("serialize", $allevents)));
        return $unique;
    }

    /**
     * @Route("/addCar/{id}", name="addcar")
     */
    public function addCar(Request $request, $id)
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
            return $this->redirectToRoute('carservice_carservice', ['id' => $id]);
        }

        return $this->render('car/add.html.twig', [
            'form' => $form->createView(),
            'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $this->getUser()->getCodeCompany()]),
        ]);
    }

    function newPlannedService($user, $parking, $usercar, $ampm, $date, $transaction, $duration, $start, $end, $price, $product, $provider, $facture,  $reduction)
    {
        $em = $this->getDoctrine()->getManager();

        $plannedcleaning = new PlannedCleaning();
        $plannedcleaning->setUserid($user);
        $plannedcleaning->setParkingId($parking);
        $plannedcleaning->setUserCarId($usercar);
        $plannedcleaning->setAmPm($ampm);
        $plannedcleaning->setDate($date);
        $plannedcleaning->setTransactionToken($transaction);
        $plannedcleaning->setDuration($duration);
        $plannedcleaning->setPlannedStart($start);
        $plannedcleaning->setPlannedEnd($end);
        $plannedcleaning->setPricePaid($price);
        $plannedcleaning->setProduit($product);
        $plannedcleaning->setProvider($provider);
        $plannedcleaning->setFacture($facture);
        $plannedcleaning->setReduction($reduction);



        $em->persist($plannedcleaning);
        $em->flush();
        return $plannedcleaning;
    }

    public function calculeFromTo($from, $to)
    {
        $array = array();

        $minstart = "";
        if ($from % 60 < 10) {
            $minstart = "0";
        }
        $minstart .= $from % 60;
        $minend = "";
        if ($to % 60 < 10) {
            $minend = "0";
        }
        $minend .= $to % 60;
        //case hour < 10
        if (floor($from / 60) % 24 < 10) {
            $from = "0" . floor($from / 60) . ":" . $minstart;
        } else {
            $from = floor($from / 60) . ":" . $minstart;
        }
        if (floor($to / 60) % 24 < 10) {
            $to = "0" . floor($to / 60) . ":" . $minend;
        } else {
            $to = floor($to / 60) . ":" . $minend;
        }
        array_push($array, [$from, $to]);

        return $array;
    }
    public function paymentIntentDirect($plannedcleaning, $price, $customerId, $paymentMeth, $providerName)
    {
        $em = $this->getDoctrine()->getManager();

        try {

            $intent = \Stripe\PaymentIntent::create([
                'amount' => $price * 100,
                'currency' => 'eur',
                'customer' =>   $customerId,
                'description' => $providerName,
                'payment_method' => $paymentMeth,
                "confirm" => "true",
                "confirmation_method" => "manual",
                'payment_method_types' => ['card']
            ]);
            return $intent;
        } catch (\Stripe\Error\ApiConnection $e) {
            $this->addFlash('Network problem, perhaps try again', $e);
            $plannedcleaning->setSupprime(1);
            $em->persist($plannedcleaning);
            $em->flush();
            return $this->redirectToRoute('carservice_carServices');
        } catch (\Stripe\Error\Api $e) {
            $this->addFlash("Stripe's servers are down!", $e);
            $plannedcleaning->setSupprime(1);
            $em->persist($plannedcleaning);
            $em->flush();
            return $this->redirectToRoute('carservice_carServices');
        } catch (\Stripe\Error\Card $e) {
            $this->addFlash("Card was declined", $e);
            $plannedcleaning->setSupprime(1);
            $em->persist($plannedcleaning);
            $em->flush();
            return $this->redirectToRoute('carservice_carServices');
        }
    }
    public function paymentIntentIndirect($plannedcleaning, $price, $customerId, $paymentMeth, $providerName)
    {
        $em = $this->getDoctrine()->getManager();

        try {

            $intent = \Stripe\PaymentIntent::create([
                'amount' => $price * 100,
                'currency' => 'eur',
                'customer' =>   $customerId,
                'description' => $providerName,
                'payment_method' => $paymentMeth,
                "confirm" => "true",
                "confirmation_method" => "manual",
                'payment_method_types' => ['card'],
                'setup_future_usage' => 'off_session',
                'capture_method' => 'manual',

            ]);
            return $intent;
        } catch (\Stripe\Error\ApiConnection $e) {
            $this->addFlash('Network problem, perhaps try again', $e);
            $plannedcleaning->setSupprime(1);
            $em->persist($plannedcleaning);
            $em->flush();
            return $this->redirectToRoute('carservice_carServices');
        } catch (\Stripe\Error\Api $e) {
            $this->addFlash("Stripe's servers are down!", $e);
            $plannedcleaning->setSupprime(1);
            $em->persist($plannedcleaning);
            $em->flush();
            return $this->redirectToRoute('carservice_carServices');
        } catch (\Stripe\Error\Card $e) {
            $this->addFlash("Card was declined", $e);
            $plannedcleaning->setSupprime(1);
            $em->persist($plannedcleaning);
            $em->flush();
            return $this->redirectToRoute('carservice_carServices');
        }
    }
    public function categoryCleanignOptions($categoryOptions, $plannedcleaning)
    {
        $em = $this->getDoctrine()->getManager();
        if ($categoryOptions != null) {
            foreach ($categoryOptions as $op) {
                $newop = new PlannedCleaningOptions();
                $newop->setPricePaid($op->getPrice());
                $newop->setPlannedCleaningId($plannedcleaning);
                $newop->setOptionId($op->getIdOption());
                $em->persist($newop);
                $em->flush();
            }
        }
    }
    public function iscFile($start, $end, $description, $summary, $location)
    {


        $fs = new Filesystem();
        //temporary folder, it has to be writable 20210714T170000Z
        $tmpFolder = '/tmp/';
        //the name of your file to attach
        $fileName = 'Appointment.ics';
        $icsContent = "
BEGIN:VCALENDAR
VERSION:2.0
CALSCALE:GREGORIAN
METHOD:REQUEST
BEGIN:VEVENT
DTSTART;TZID=Europe/Luxembourg:" . $start . "
DTEND;TZID=Europe/Luxembourg:" . $end . "
ORGANIZER;CN=Lucett:mailto:do-not-reply#lucette.market
DESCRIPTION:" . $description . "
LOCATION: " . $location . "
SEQUENCE:0
STATUS:CONFIRMED
SUMMARY:" . $summary . "
TRANSP:OPAQUE
END:VEVENT
END:VCALENDAR";
        $icfFile = $fs->dumpFile($tmpFolder . $fileName, $icsContent);
        $res = base64_encode($icsContent);
        return $res;
    }
}
