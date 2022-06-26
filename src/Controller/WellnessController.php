<?php

namespace App\Controller;

use App\Entity\PlannedCleaning;
use App\Entity\PlannedCleaningOptions;
use App\Entity\Reduction;
use App\Mail\ReponseMail;
use App\Repository\GoogleCalendarApiRepository;
use App\Entity\CreditCard;
use App\Repository\AvailabilityRepository;
use App\Repository\CategoryOptionRepository;
use App\Repository\CategoriesRepository;
use App\Repository\CategoryProductRepository;
use App\Repository\CategoryLocationRepository;
use App\Repository\CategoryProviderRepository;
use App\Repository\CreditCardRepository;
use App\Repository\MooveeCompanyRepository;
use App\Repository\MooveeUsersRepository;
use App\Repository\MooveeUserHasCarRepository;
use App\Repository\PlannedCleaningRepository;
use App\Repository\ProductsRepository;
use App\Repository\ReductionRepository;
use App\Repository\OptionRepository;
use App\Repository\ParkingsRepository;
use App\Repository\ServiceRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

/**
 * @Route("/wellness", name="wellness_")
 */
class WellnessController extends AbstractController
{
    private $mailer;
    private $mooveeCompanyRepository;
    private $availabilityRepository;
    private $categoryOptionRepository;
    private $optionRepository;
    private $categoryProductRepository;
    private $creditCardRepository;
    private $plannedCleaningRepository;
    private $reductionRepository;
    private $categoriesRepository;
    private $parkingsRepository;
    private $mooveeUsersRepository;
    private $serviceRepository;
    private $categoryLocationRepository;
    private $categoryProviderRepository;
    private $googleCalendarApiRepository;


    public function __construct(
        ReductionRepository $reductionRepository,
        PlannedCleaningRepository $plannedCleaningRepository,
        CreditCardRepository $creditCardRepository,
        CategoryProductRepository $categoryProductRepository,
        ProductsRepository $productsRepository,
        MooveeUserHasCarRepository $mooveeUserHasCarRepository,
        MooveeCompanyRepository $mooveeCompanyRepository,
        AvailabilityRepository $availabilityRepository,
        CategoryOptionRepository $categoryOptionRepository,
        CategoriesRepository $categoriesRepository,
        OptionRepository $optionRepository,
        ParkingsRepository $parkingsRepository,
        MooveeUsersRepository $mooveeUsersRepository,
        ServiceRepository $serviceRepository,
        CategoryLocationRepository $categoryLocationRepository,
        CategoryProviderRepository $categoryProviderRepository,
        GoogleCalendarApiRepository $googleCalendarApiRepository

    ) {
        $this->mooveeCompanyRepository = $mooveeCompanyRepository;
        $this->availabilityRepository = $availabilityRepository;
        $this->categoryOptionRepository = $categoryOptionRepository;
        $this->mooveeUserHasCarRepository = $mooveeUserHasCarRepository;
        $this->productsRepository = $productsRepository;
        $this->categoryProductRepository = $categoryProductRepository;
        $this->creditCardRepository = $creditCardRepository;
        $this->plannedCleaningRepository = $plannedCleaningRepository;
        $this->reductionRepository = $reductionRepository;
        $this->categoriesRepository = $categoriesRepository;
        $this->optionRepository = $optionRepository;
        $this->parkingsRepository = $parkingsRepository;
        $this->mooveeUsersRepository = $mooveeUsersRepository;
        $this->serviceRepository = $serviceRepository;
        $this->categoryLocationRepository = $categoryLocationRepository;
        $this->categoryProviderRepository = $categoryProviderRepository;
        $this->googleCalendarApiRepository = $googleCalendarApiRepository;
    }


    /**
     * @Route("", name="wellnessServices")
     */
    public function index()
    {
        $user =  $this->getUser();
        $available = array();
        $company = $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]);
        $service = $this->serviceRepository->findOneby(['id' => 2]);
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

            $duration = $minutesfin - $minutesdeb;

            $planned = $this->plannedCleaningRepository->findBy(['Provider' => $availability->getProvider(), 'date' => $availability->getDate(), 'parkingId' => $availability->getParking(), 'valide' => null]);
            $currentduration = 0;
            foreach ($planned as $plan) {
                $currentduration = $currentduration + $plan->getDuration();
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
                        //  array_push($arrayofCategory, $idOfProviderCat);

                        // foreach($parkingCat as $categoryOfLocation){
                        // $idOfLocationCat = $categoryOfLocation->getCategory();
                        array_push($available, $availability);
                        $product = $this->categoryProductRepository->FindProductByCat($idOfProviderCat, $availability->getProvider());
                        if ($product != null) {
                            array_push($arrayofCategory, $idOfProviderCat);
                        }
                    }
                }
                array_push($nextAvailable, [$availability, 'start' => $events[0]['start']]);
            }
        }

        $unique = array_map("unserialize", array_unique(array_map("serialize", $arrayofCategory)));
        $categories = $this->categoriesRepository->findBy(['id' => $unique]);

        return $this->render('wellness/index.html.twig', [
            'myCategories' => $categories,
            'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
            'availabilities' => $available,
            'nextAvailable' => $nextAvailable,
            'creditCard' => $this->creditCardRepository->findBy(['customerId' => $user]),
            'planned_cleanings' => $this->plannedCleaningRepository->findBy(['userid' => $user, 'valide' => null], ['date' => 'ASC']),
        ]);
    }

    /**
     * @Route("conf/", name="email")
     */
    public function modifier()
    {
        $user = $this->getUser(); //ToDo
        $message = (new \Swift_Message('MooveeClean Comfirmation'))
            ->setFrom('noreply@moovee.lu')
            ->setTo($user->getEmail())
            ->setBody($this->renderView('email/signup.html.twig', ['token' => $user->getVerifyToken()]), 'text/html');
        $this->mailer->send($message);
        return $this->redirectToRoute('wellness_dashboard');
    }

    /**
     * @Route("/{id}", name="productid")
     */
    function product($id)
    {
        $user = $this->getUser();
        $allproducts = array();
        $company = $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]);
        $availabilities = $this->availabilityRepository->findIncomingByServiceNoNeedCar($company, $id, 2);

        foreach ($availabilities as $availability) {
            $product = $this->categoryProductRepository->FindProductByCat($id, $availability->getProvider());
            array_push($allproducts, $product);
        }
        $allproducts = array_map("unserialize", array_unique(array_map("serialize", $allproducts)));
        $allproducts = call_user_func_array('array_merge', $allproducts);

        return $this->render('wellness/product.html.twig', [
            'availabilities' => $availabilities,
            'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
            'products' => $allproducts,
            'serviceId' => $id
        ]);
    }
    /**
     * @Route("/{serviceid}/productid/{id}", name="option")
     */
    function options(Request $request, $serviceid, $id)
    {
        $user = $this->getUser();
        $categoryOptions = array();
        $numbersOfOptions = 0;
        $avaible = array();


        $availabilities = $this->availabilityRepository->avaibyproduct(['id_product' => $id], $user->getCodeCompany());
        $currentproduct = $this->categoryProductRepository->findOneBy(['id_product' => $id]);

        $myoption = $this->optionRepository->findBy(['id_product' => $id, 'supprime' => null]);
        foreach ($myoption as $option) {
            $categoryOption = $this->categoryOptionRepository->findBy(['id_option' => $option->getId()]);
            array_push($categoryOptions, $categoryOption);
        }

        $numbersOfOptions = count($myoption);
        if ($categoryOptions != null) {
            return $this->render('wellness/option.html.twig', [
                'options' => $categoryOptions,
                'currentproduct' => $currentproduct,
                'availabilities' => $availabilities,
                'numbersOfOptions' => $numbersOfOptions,
                'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
                'serviceId' => $serviceid,
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

            return $this->render('wellness/locationchoice.html.twig', [
                'duration' => $currentproduct->getTime(),
                'catproduct' => $currentproduct->getId(),
                'achat' => $currentproduct->getIdProduct()->getDirectBuy(),
                'categoryproduct' => $currentproduct,
                'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
                'avaible' => $avaible,
                'options' => $categoryOptions,


            ]);
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

            return $this->render('wellness/locationchoice.html.twig', [
                'duration' => $categoryProduct->getTime(),
                'options' => $categoryoptions,
                'catproduct' => $id,
                'achat' => $categoryProduct->getIdProduct()->getDirectBuy(),
                'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
                'categoryproduct' => $categoryProduct,
                'avaible' => $avaible,

            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e);
            return $this->redirectToRoute('wellness_wellnessServices');
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

            return $this->render('wellness/datechoice.html.twig', [
                'duration' => $categoryProduct->getTime(),
                'achat' => $categoryProduct->getIdProduct()->getDirectBuy(),
                'categoryproduct' => $categoryProduct,
                'catproduct' => $_POST['catproduct_id'],
                'options' => $categoryOptions,
                'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
                'directAvailabilities' => $directAvailability,
                'currentparking' => $currentparking,
                'image' => $image

            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e);
            return $this->redirectToRoute('wellness_wellnessServices');
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

        try {
            if (!empty($_POST['val'])) {
                // loop to retrieve checked values
                $options = $_POST['val'];
                foreach ($options as $optionid) {
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

            foreach ($availabilities as $availability) {
                $events = $this->calculEvent($availability, $duration);
                if ($events != null) {
                    array_push($res, [$availability, $events]);
                }
            }

            return $this->render('wellness/mycalendar.html.twig', [
                'product' => $product,
                'duration' => $categoryProduct->getTime(),
                'availabilities' => $availabilities,
                'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
                'res' => $res,
                'options' => $options
            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e);
            return $this->redirectToRoute('wellness_wellnessServices');
        }
    }
    /**
     * @Route("/order/resume", name="resumedirect")
     */
    public function resumeDirect(Request $request)
    {

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
                foreach ($_POST['val'] as $optionId) {
                    $categoryOption = $this->categoryOptionRepository->findBy(['id' => $optionId]);
                    foreach ($categoryOption as $catop) {
                        $option = $this->optionRepository->findOneBy(["id" => $catop->getIdOption()->getId()]);
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
            $categoryProduct = $this->categoryProductRepository->findOneBy(['id_product' => $_POST['product_id']]);
            /****************** availability ***********************/
            $availability = $this->availabilityRepository->findOneBy(['id' => $idavailability]);


            /****************** calculate time of order ***********************/

            $heuredeb = explode(":", $startTime);
            $plannedStart = ($heuredeb[0] * 60) + $heuredeb[1];
            $planned = $this->plannedCleaningRepository->findBy(['date' => $availability->getDate(), 'parkingId' => $availability->getParking(), "Provider" => $availability->getProvider(), "supprime" => null]);
            $duration = $categoryProduct->getTime() + $durationOption;

            $plannedEnd = $plannedStart + $duration;

            $priceTotal = $priceOption + $categoryProduct->getPrice();
            $vat = 0.17 * $priceTotal;

            $time = $this->calculeFromTo($plannedStart, $plannedEnd);
            $user = $this->getUser();

            return $this->render('wellness/resume.html.twig', [
                'categoryProduct' => $categoryProduct,
                'options' => $options,
                'product' => $this->productsRepository->findOneBy(['id' => $_POST['product_id']]),
                'priceTotal' => $priceTotal,
                'categoryOption' => $categoryOptions,
                'parking' => $availability->getParking(),
                'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
                'date' => $availability->getDate()->format('d/m/Y'),
                'start' => $time[0][0],
                'end' => $time[0][1],
                'vat' => $vat,
                'availability' => $availability

            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e);
            return $this->redirectToRoute('wellness_wellnessServices');
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
        $categoryOptions = array();
        $categoryOption = "";
        $availability = "";
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
            $categoryProduct = $this->categoryProductRepository->findOneBy(['id_product' => $params['product']]);


            $priceTotal = $categoryProduct->getPrice() + $priceOption;
            $vat = 0.17 * $priceTotal;


            return $this->render('wellness/resume.html.twig', [
                'product' => $this->productsRepository->findOneBy(['id' => $params['product']]),
                'options' => $options,
                'categoryProduct' => $categoryProduct,
                'categoryOption' => $categoryOptions,
                'priceTotal' => $priceTotal,
                'date' => $date,
                'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
                'end' => $end,
                'start' => $start,
                'parking' => $this->parkingsRepository->findOneBy(['id' => $params['parking']]),
                'vat' => $vat,
                'availability' => $availability

            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e);
            return $this->redirectToRoute('wellness_wellnessServices');
        }
    }

    /**
     * @Route("Payment", name="payment")
     */
    public function paiment(Request $request)
    {
        if ($request->getMethod() == 'POST') {

            // \Stripe\Stripe::setApiKey($this->getParameter('private_key_stripe'));

            $user = $this->getUser();

            $plannedcleaning = new PlannedCleaning();
            $em = $this->getDoctrine()->getManager();

            $availability = $this->availabilityRepository->findOneBy(['id' => $request->request->get('availability')]);
            $duration = 0;
            $price = 0;

            $product = $this->categoryProductRepository->findOneBy(['id' => $request->request->get('product_id')]);

            $duration = $duration + $product->getTime();
            $price = $price + $product->getPrice();

            $options = array();
            $categoryOptions = array();
            $opts = array();
            if (isset($_POST['options'])) {
                foreach ($_POST['options'] as $idop) {
                    $categoryOption = $this->categoryOptionRepository->findOneBy(['id' => $idop]);
                    // foreach ($categoryOption as $catop) {
                    $optionId = $categoryOption->getIdOption()->getId();
                    $option = $this->optionRepository->findOneBy(["id" => $optionId]);
                    array_push($categoryOptions, $categoryOption);
                    array_push($options, $option);
                    array_push($opts, $option->getName());
                    //  }
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
                $plannedcleaning->setReduction($reduction->getId());
                if ($price < 0) {
                    $price = 0;
                }
            }
            $creditCards = $this->creditCardRepository->findBy(['customerId' => $user]);
            $time = $this->calculeFromTo($plannedStart, $plannedEnd);
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
                    null,
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


                $message = new ReponseMail();
                $messagePro = new ReponseMail();

                $message->sendReservation($user->getEmail(), $facture, $dateOfService, $plannedcleaning->getProduit()->getOption(), $plannedcleaning->getProduit()->getName(),  number_format($price, 2, ' . ', ', '), $icsDocument);
                $provider = $this->mooveeUsersRepository->findAdminWorkerByProvider($availability->getProvider());
                $orderUser = $this->mooveeUsersRepository->findOneBy(['id' => $user->getId()]);
                $mvuser = $orderUser->getFirstName() . " " . $orderUser->getLastName();
                $letitre = $plannedcleaning->getProduit()->getName() . "/" .  $availability->getParking()->getName();
                $lieu = $availability->getParking()->getName() . " " . $availability->getParking()->getAddress();
                $lecorps =
                    "Client : " . $mvuser .
                    "\\nEmail : " . $orderUser->getEmail() .
                    "\\nTéléphone : " . $orderUser->getPhoneNumber() .
                    "\\nProduit : " . $plannedcleaning->getProduit()->getName() .
                    "\\nOptions :" . implode('\n', $opts) .
                    "\\nTarif : " . number_format($price, 2, ' . ', ', ') .
                    "\\nLieu : " . $availability->getParking()->getName() . " " . $availability->getParking()->getAddress();
                $icsDocumentProvider = $this->iscFile($sEvent->format('Ymd\THis'), $eEvent->format('Ymd\THis'), $lecorps, $letitre,  $lieu);
                foreach ($provider as $p) {
                    $messagePro->sendMailDirectToProvider($p->getEmail(), $mvuser, $dateOfService, $availability->getParking()->getName(), $plannedcleaning->getProduit()->getName(), $plannedcleaning->getProduit()->getOption(), $icsDocumentProvider);
                }
                return $this->redirectToRoute("cms_dashboard");
            } else {
                $decimal = round(($price - floor($price)) * 100, 0);
                if ($decimal == 0)
                    $decimal = 100;
                return $this->render('wellness/payment.html.twig', [
                    'user' => $user,
                    'creditCards' => $creditCards,
                    'product' => $this->productsRepository->findOneBy(['id' => $product->getIdProduct()]),
                    'options' => $options,
                    'categoryProduct' => $product,
                    'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
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
            $categoryOptions = array();
            \Stripe\Stripe::setApiKey($this->getParameter('private_key_stripe'));

            $availability = $this->availabilityRepository->findOneBy(['id' => $request->request->get('availability')]);
            $product = $this->categoryProductRepository->findOneBy(['id' => $request->request->get('product_id')]);
            $creditCards = $this->creditCardRepository->findOneBy(['id' => $_POST['creditCard']]);

            if (isset($_POST['options'])) {
                foreach ($_POST['options'] as $idop) {
                    $categoryOption = $this->categoryOptionRepository->findOneBy(['id' => $idop]);
                    foreach ($categoryOption as $catop) {
                        array_push($categoryOptions, $catop);
                    }
                }
            }

            $from = $request->request->get('start');
            $to = $request->request->get('end');
            $duration = $request->request->get('duration');
            $usedReduction = $request->request->get('usedReduction');
            $opts = array();
            if (isset($_POST['opt'])) {
                foreach ($_POST['opt'] as $opt) {
                    array_push($opts, $opt);
                }
            }
            $time = $this->calculeFromTo($from, $to);
            $plannedcleaning = $this->newPlannedService(
                $user,
                $availability->getParking(),
                null,
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
            $provider = $this->mooveeUsersRepository->findAdminWorkerByProvider($availability->getProvider());
            $providerName = $availability->getProvider()->getName();
            $dateOfService = $availability->getDate()->format('m-d-Y') . ' - ' . $time[0][0] . " to " . $time[0][1];
            $startEvent = $availability->getDate()->format('Ymd') . $time[0][0];
            $endEvent = $availability->getDate()->format('Ymd') . $time[0][1];
            $sEvent = new DateTime($startEvent);
            $eEvent = new DateTime($endEvent);
            $icsDocument = $this->iscFile($sEvent->format('Ymd\THis'), $eEvent->format('Ymd\THis'),  $product->getIdProduct()->getDescription(), $product->getIdProduct()->getName(), $availability->getParking()->getAddress());
            $orderUser = $this->mooveeUsersRepository->findOneBy(['id' => $user->getId()]);
            $mvuser = $orderUser->getFirstName() . " " . $orderUser->getLastName();
            $letitre = $plannedcleaning->getProduit()->getName() . "/" .  $availability->getParking()->getName();
            $lieu = $availability->getParking()->getName() . " " . $availability->getParking()->getAddress();
            $lecorps =
                "Client : " . $mvuser .
                "\\nEmail : " . $orderUser->getEmail() .
                "\\nTéléphone : " . $orderUser->getPhoneNumber() .
                "\\nProduit : " . $plannedcleaning->getProduit()->getName() .
                "\\nOptions : " . implode('\n', $opts) .
                "\\nTarif : " . number_format($price, 2, ' . ', ', ') .
                "\\nLieu : " . $availability->getParking()->getName() . " " . $availability->getParking()->getAddress();
            $icsDocumentProvider = $this->iscFile($sEvent->format('Ymd\THis'), $eEvent->format('Ymd\THis'), $lecorps, $letitre,  $lieu);
            $temp = $this->getParameter('app_path');

            if ($product->getIdProduct()->getDirectBuy() == true || $product->getIdProduct()->getAutoValide() == true) {

                $intent = $this->paymentIntentDirect($plannedcleaning, $price, $user->getCustomerToken(), $creditCards->getCardToken(), $providerName);
                //create a facture
                $facture = "INV_GS_" . date_format($availability->getDate(), 'Ym') . '000' . $plannedcleaning->getId();
                /*************************************** Update planned cleaning ***************************************************/
                $plannedcleaning->setTransactionToken($intent->id);
                $plannedcleaning->setFacture($facture);
                $em->persist($plannedcleaning);
                $em->flush();
                /************************************* Message *****************************************************/

                $message = new ReponseMail();
                $messagePro = new ReponseMail();

                //toUser
                $message->sendReservation($plannedcleaning->getUserId()->getEmail(), $facture, $dateOfService, $plannedcleaning->getProduit()->getName(), $plannedcleaning->getProduit()->getOption(), number_format($price, 2, ' . ', ', '), $icsDocument);
                //toProvider
                foreach ($provider as $p) {
                    $messagePro->sendMailDirectToProvider($p->getEmail(), $mvuser, $dateOfService, $availability->getParking()->getName(), $plannedcleaning->getProduit()->getName(), $plannedcleaning->getProduit()->getOption(), $icsDocumentProvider);
                }
                $path = $temp . "/app/public/valide/" . $plannedcleaning->getId();
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

                $message = new ReponseMail();
                $messagePro = new ReponseMail();

                //toProvider
                foreach ($provider as $p) {
                    $messagePro->sendMailToProvider($p->getEmail(), $mvuser, $dateOfService, $availability->getParking()->getName(), $plannedcleaning->getId(), $plannedcleaning->getProduit()->getName(), $plannedcleaning->getProduit()->getOption(), $icsDocumentProvider);
                }

                $message->sendReservationIndirect($plannedcleaning->getUserId()->getEmail(), $dateOfService, $plannedcleaning->getProduit()->getName(), $plannedcleaning->getProduit()->getOption(), number_format($price, 2, ' . ', ', '), $icsDocument);


                $path = $temp . "/app/public/";
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
            $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();
            $categoryOptions = array();

            \Stripe\Stripe::setApiKey($this->getParameter('private_key_stripe'));



            $card = new CreditCard();
            $token = $_POST['stripeToken'];

            $availability = $this->availabilityRepository->findOneBy(['id' => $request->request->get('availability')]);
            $product = $this->categoryProductRepository->findOneBy(['id' => $request->request->get('product_id')]);

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
            $from = $request->request->get('start');
            $to = $request->request->get('end');
            $duration = $request->request->get('duration');
            $usedReduction = $request->request->get('usedReduction');

            $time = $this->calculeFromTo($from, $to);
            $plannedcleaning = $this->newPlannedService(
                $user,
                $availability->getParking(),
                null,
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

            $provider = $this->mooveeUsersRepository->findAdminWorkerByProvider($availability->getProvider());
            $providerName = $availability->getProvider()->getName();
            $orderUser = $this->mooveeUsersRepository->findOneBy(['id' => $user->getId()]);
            $mvuser = $orderUser->getFirstName() . " " . $orderUser->getLastName();
            $letitre = $plannedcleaning->getProduit()->getName() . "/" .  $availability->getParking()->getName();
            $lieu = $availability->getParking()->getName() . " " . $availability->getParking()->getAddress();
            $lecorps =
                "Client : " . $mvuser .
                "\\nEmail : " . $orderUser->getEmail() .
                "\\nTéléphone : " . $orderUser->getPhoneNumber() .
                "\\nProduit : " . $plannedcleaning->getProduit()->getName() .
                "\\nOptions : " . implode('\n', $opts) .
                "\\nTarif : " . number_format($price, 2, ' . ', ', ') .
                "\\nLieu : " . $availability->getParking()->getName() . " " . $availability->getParking()->getAddress();
            $icsDocumentProvider = $this->iscFile($sEvent->format('Ymd\THis'), $eEvent->format('Ymd\THis'), $lecorps, $letitre,  $lieu);
            $temp = $this->getParameter('app_path');

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
                foreach ($provider as $p) {
                    $messagePro->sendMailDirectToProvider($p->getEmail(), $mvuser, $dateOfService, $availability->getParking()->getName(), $plannedcleaning->getProduit()->getName(), $plannedcleaning->getProduit()->getOption(), $icsDocumentProvider);
                }
                $path = $temp . "/app/public/valide/" . $plannedcleaning->getId();
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
                $message = new ReponseMail();
                $messagePro = new ReponseMail();


                foreach ($provider as $p) {
                    $messagePro->sendMailToProvider($p->getEmail(), $mvuser, $dateOfService, $availability->getParking()->getName(), $plannedcleaning->getId(), $plannedcleaning->getProduit()->getName(), $plannedcleaning->getProduit()->getOption(), $icsDocumentProvider);
                }
                $message->sendReservationIndirect($plannedcleaning->getUserId()->getEmail(), $dateOfService, $plannedcleaning->getProduit()->getName(), $plannedcleaning->getProduit()->getOption(), number_format($price, 2, ' . ', ', '), $icsDocument);

                $path = $temp . "/app/public/";
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

        $plannedcleaning = $this->plannedCleaningRepository->findOneBy(['id' => $id, 'userid' => $user->getId(), 'valide' => '1']);

        if ($plannedcleaning) {
            $em = $this->getDoctrine()->getManager();
            $facture = $plannedcleaning->getFacture();

            $laDate = $plannedcleaning->getDate();
            $from = $plannedcleaning->getPlannedStart();
            $to = $plannedcleaning->getPlannedEnd();

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
            if ($from / 60 < 10) {
                $from = "0" . floor($from / 60) . ":" . $minstart;
            } else {
                $from = floor($from / 60) . ":" . $minstart;
            }
            if ($to / 60 < 10) {
                $to = "0" . floor($to / 60) . ":" . $minend;
            } else {
                $to = floor($to / 60) . ":" . $minend;
            }

            $dateOfService = $laDate->format('m-d-Y') . ' - ' . floor($from / 60) . ':' . $minstart . ' to ' . floor($to / 60) . ':' . $minend;
            $price = $plannedcleaning->getPricePaid();



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


        return $this->redirectToRoute("wellness_dashboard");
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
        while ($plannedfin <= $minutesfin - $duration) {
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

        // die;
        $unique = array();
        $unique = array_map("unserialize", array_unique(array_map("serialize", $allevents)));
        return $unique;
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
