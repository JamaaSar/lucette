<?php

namespace App\Controller;

use App\Mail\CalendarGoogle;
use App\Entity\GoogleCalendarApi;
use App\Repository\AvailabilityRepository;
use App\Repository\CategoryOptionRepository;
use App\Repository\CategoryProductRepository;
use App\Repository\CategoriesRepository;
use App\Repository\CreditCardRepository;
use App\Repository\GoogleCalendarApiRepository;
use App\Repository\MooveeCompanyRepository;
use App\Repository\MooveeCarRepository;
use App\Repository\MooveeUserHasCarRepository;
use App\Repository\OptionRepository;
use App\Repository\PlannedCleaningOptionsRepository;
use App\Repository\PlannedCleaningRepository;
use App\Repository\ProductsRepository;
use App\Repository\ProviderRepository;
use App\Repository\ReductionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Google_Client;





/**
 * @Route("/", name="cms_")
 */
class CmsController extends AbstractController
{


    /**
     * @var \Swift_Mailer
     */
    private $mailer;
    private $mooveeCompanyRepository;
    private $availabilityRepository;
    private $mooveeUserHasCarRepository;
    private $productsRepository;
    private $providerRepository;
    private $categoryProductRepository;
    private $creditCardRepository;
    private $plannedCleaningRepository;
    private $plannedCleaningOptionsRepository;
    private $optionRepository;
    private $googleCalendarApiRepository;

    public function __construct(
        ReductionRepository $reductionRepository,
        PlannedCleaningOptionsRepository $cleaningOptionsRepository,
        PlannedCleaningRepository $plannedCleaningRepository,
        CreditCardRepository $creditCardRepository,
        CategoryProductRepository $categoryProductRepository,
        ProductsRepository $productsRepository,
        MooveeUserHasCarRepository $mooveeUserHasCarRepository,
        \Swift_Mailer $mailer,
        MooveeCompanyRepository $mooveeCompanyRepository,
        AvailabilityRepository $availabilityRepository,
        CategoryOptionRepository $categoryOptionRepository,
        CategoriesRepository $categoriesRepository,
        MooveeCarRepository $mooveeCarRepository,
        PlannedCleaningOptionsRepository $plannedCleaningOptionsRepository,
        OptionRepository $optionRepository,
        ProviderRepository $providerRepository,
        GoogleCalendarApiRepository $googleCalendarApiRepository
    ) {
        $this->mailer = $mailer;
        $this->mooveeCompanyRepository = $mooveeCompanyRepository;
        $this->availabilityRepository = $availabilityRepository;
        $this->categoryOptionRepository = $categoryOptionRepository;
        $this->mooveeUserHasCarRepository = $mooveeUserHasCarRepository;
        $this->productsRepository = $productsRepository;
        $this->categoryProductRepository = $categoryProductRepository;
        $this->creditCardRepository = $creditCardRepository;
        $this->plannedCleaningRepository = $plannedCleaningRepository;
        $this->cleaningOptionsRepository = $cleaningOptionsRepository;
        $this->reductionRepository = $reductionRepository;
        $this->categoriesRepository = $categoriesRepository;
        $this->mooveeCarRepository = $mooveeCarRepository;
        $this->plannedCleaningOptionsRepository = $plannedCleaningOptionsRepository;
        $this->optionRepository = $optionRepository;
        $this->providerRepository = $providerRepository;
        $this->googleCalendarApiRepository = $googleCalendarApiRepository;
    }


    /**
     * @Route("", name="dashboard")
     */
    public function index(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user =  $this->getUser();
        $googleCalendarConnected = $this->googleCalendarApiRepository->findOneBy(['iduser' => $user->getId()]);




        /********************DATE***********************/
        $currentDate = new \DateTime();
        $currentYear = date("Y", strtotime($currentDate->format('d-m-Y')));
        $currentMonth = date("m", strtotime($currentDate->format('d-m-Y')));
        $caJanvier = 0;
        $caFevrier = 0;
        $caMars = 0;
        $caAvril = 0;
        $caMay = 0;
        $caJuin = 0;
        $caJuillet = 0;
        $caAout = 0;
        $caSeptembre = 0;
        $caOctobre = 0;
        $caNovembre = 0;
        $caDecembre = 0;
        $resultat = array();
        $chiffreAffaire = 0;

        $available = array();
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {

            $availabilities = $this->availabilityRepository->findIncommingByUser($user->getCodeCompany());
            /********************DATE***********************/
            $allOrdersOfProvider = $this->plannedCleaningRepository->findBy(['Provider' => $user->getProvider(), "supprime" => null, "valide" => null]);
            $incomingOrders = $this->plannedCleaningRepository->findForAdminWorker($user->getProvider());
        } else {

            $availabilities = $this->availabilityRepository->findIncomming();
            /********************DATE***********************/
            $allOrdersOfProvider = $this->plannedCleaningRepository->findBy(["supprime" => null, "valide" => null]);
            $providers = $this->providerRepository->findAll();
            //  foreach($providers as $provider){
            $incomingOrders = $this->plannedCleaningRepository->findIncomingOrder();
            //  }


        }
        $i = 0;
        foreach ($allOrdersOfProvider as $order) {
            $orderDate = $order->getDate();
            $year = date("Y", strtotime($orderDate->format('d-m-Y')));

            if ($currentYear == $year) {
                $i++;
                $month = date("m", strtotime($orderDate->format('d-m-Y')));
                if ($month == "01") {
                    $caJanvier += $this->chiffredafbyorder($order);
                } elseif ($month == "02") {
                    $caFevrier += $this->chiffredafbyorder($order);
                } elseif ($month == "03") {
                    $caMars += $this->chiffredafbyorder($order);
                } elseif ($month == "04") {
                    $caAvril += $this->chiffredafbyorder($order);
                } elseif ($month == "05") {
                    $caMay += $this->chiffredafbyorder($order);
                } elseif ($month == "06") {
                    $caJuin += $this->chiffredafbyorder($order);
                } elseif ($month == "07") {
                    $caJuillet  += $this->chiffredafbyorder($order);
                } elseif ($month == "08") {

                    $caAout += $this->chiffredafbyorder($order);
                } elseif ($month == "09") {
                    $caSeptembre += $this->chiffredafbyorder($order);
                } elseif ($month == "10") {
                    $caOctobre += $this->chiffredafbyorder($order);
                } elseif ($month == "11") {
                    $caNovembre += $this->chiffredafbyorder($order);
                } elseif ($month == "12") {
                    $caDecembre += $this->chiffredafbyorder($order);
                } else {
                    break;
                }
                if ($month == $currentMonth) {
                    $chiffreAffaire += $this->chiffredafbyorder($order);
                }
            }
        }


        $arrData = [
            ["month" => "01", 'ca' => rtrim(rtrim((string)number_format($caJanvier, 2, ".", ""), "0"), ".")],
            ["month" => "02", 'ca' => rtrim(rtrim((string)number_format($caFevrier, 2, ".", ""), "0"), ".")],
            ["month" => "03", 'ca' => rtrim(rtrim((string)number_format($caMars, 2, ".", ""), "0"), ".")],
            ["month" => "04", 'ca' => rtrim(rtrim((string)number_format($caAvril, 2, ".", ""), "0"), ".")],
            ["month" => "05", 'ca' => rtrim(rtrim((string)number_format($caMay, 2, ".", ""), "0"), ".")],
            ["month" => "06", 'ca' => rtrim(rtrim((string)number_format($caJuin, 2, ".", ""), "0"), ".")],
            ["month" => "07", 'ca' => rtrim(rtrim((string)number_format($caJuillet, 2, ".", ""), "0"), ".")],
            ["month" => "08", 'ca' => rtrim(rtrim((string)number_format($caAout, 2, ".", ""), "0"), ".")],
            ["month" => "09", 'ca' => rtrim(rtrim((string)number_format($caSeptembre, 2, ".", ""), "0"), ".")],
            ["month" => "10", 'ca' => rtrim(rtrim((string)number_format($caOctobre, 2, ".", ""), "0"), ".")],
            ["month" => "11", 'ca' => rtrim(rtrim((string)number_format($caNovembre, 2, ".", ""), "0"), ".")],
            ["month" => "12", 'ca' => rtrim(rtrim((string)number_format($caDecembre, 2, ".", ""), "0"), ".")]
        ];

        $nbIncoming = count($incomingOrders);
        $nbAvailability = count($availabilities);

        foreach ($availabilities as $availability) {
            $heuredeb = explode(":", $availability->getDebut());
            $heurefin = explode(":", $availability->getFin());
            $provider = $availability->getProvider();
            $country = $provider->getCountry();

            $minutesdeb = ($heuredeb[0] * 60) + $heuredeb[1];
            $minutesfin = ($heurefin[0] * 60) + $heurefin[1];

            $duration = $minutesfin - $minutesdeb;

            $planned = $this->plannedCleaningRepository->findBy(['Provider' => $availability->getProvider(), 'date' => $availability->getDate(), 'parkingId' => $availability->getParking(), 'valide' => null]);

            $currentduration = 0;

            foreach ($planned as $plan) {
                $currentduration = $currentduration + $plan->getDuration();
            }
            $x = $duration - ($currentduration + 75);
            //dump($duration . " - (" . $currentduration . " + 75) = " . $x);
            if (($currentduration + 60) <= $duration and $country == "cars") {
                array_push($available, $availability);
            }
        }
        $currentprovider = $this->getUser()->getProvider();
        $plannedCleaning = "";
        $nb = 0;



        if ($this->isGranted('ROLE_WORKER_ADMIN')) {
            $plannedCleaning = $this->plannedCleaningRepository->findBy(['Provider' => $currentprovider, 'captured' => 1, 'valide' => 1, "edited" => null, 'supprime' => null]);
        }

        if ($this->isGranted('ROLE_ADMIN')) {
            $plannedCleaning = $this->plannedCleaningRepository->findBy(['captured' => 1, 'valide' => 1, 'supprime' => null]);
        }
        if ($this->isGranted('ROLE_USER')) {
            $plannedCleaning = $this->plannedCleaningRepository->findBy(['userid' => $user, 'valide' => 1, 'edited' => 1, 'supprime' => null, 'captured' => 1], ['date' => 'ASC']);

            $nb = count($plannedCleaning);
        }



        return $this->render('cms/index.html.twig', [
            'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
            'availabilities' => $available,
            'nbIncoming' => $nbIncoming,
            'nbAvailability' => $nbAvailability,
            'mois' => date("F", strtotime($currentDate->format('d-m-Y'))),
            'chiffreDaf' => rtrim(rtrim((string)number_format($chiffreAffaire, 2, ".", ""), "0"), "."),
            'arrData' => $arrData,
            'creditCard' => $this->creditCardRepository->findBy(['customerId' => $user]),
            'planned_cleanings' => $this->plannedCleaningRepository->findBy(['userid' => $user, 'valide' => null], ['date' => 'ASC']),
            'car' => $this->mooveeUserHasCarRepository->findBy(['user_has_car_id_user' => $user, 'is_deleted' => null]),
            'plannedCleaning' => count($plannedCleaning),
            'avalider' => $this->plannedCleaningRepository->findBy(['userid' => $user, 'valide' => 1, 'edited' => 1, 'supprime' => null, 'captured' => 1], ['date' => 'ASC']),
            "validerbyuser" => $nb,
            'googleCalendarConnected' => $googleCalendarConnected

        ]);
    }




    function chiffredafbyorder($order)
    {

        $nb = 0;
        $sumPrice = 0;
        $commgeneral = 0;
        $prix = $order->getPricePaid();
        $car = $this->mooveeUserHasCarRepository->findOneBy(['id' => $order->getUserCarId()]);
        $reduc = $order->getReduction();

        $nb += 1;
        $sumPrice = $prix + $sumPrice;
        //pour un produit
        $ordreprice = $order->getPricePaid();
        if ($ordreprice == 0) {
            $chiffreAffaire = 0;
        } else {
            $produit = $order->getProduit();
            if ($car != null) {
                $carCat = $car->getUserHasCarIdCar()->getCategoryCar();
                $priceProduit = $this->categoryProductRepository->findOneBy(['id_product' => $produit, 'category' => $carCat]);
                if ($priceProduit != null) {
                    $priceProduit = $priceProduit->getPrice();
                }
            } else {
                $priceProduit = $this->categoryProductRepository->findOneBy(['id_product' => $produit]);
                if ($priceProduit != null) {
                    $priceProduit = $priceProduit->getPrice();
                }
            }
            $commProduit = $this->productsRepository->findOneBy(['id' => $produit]);
            $orderOption = $this->plannedCleaningOptionsRepository->findOneBy(['planned_cleaning_id' => $order->getId()]);

            if (empty($orderOption)) {
                $prixSansCommOp = 0;
            } else {
                $option = $this->optionRepository->findOneBy(['id' => $orderOption->getOptionId()]);
                $pricepaid = $orderOption->getPricePaid();
                $commgeneral += $option->getCommission();
                $prixSansCommOp = $pricepaid * (1 - $option->getCommission());
            }

            $prixSansCommProd = $priceProduit * (1 - $commProduit->getCommission());
            $commgeneral += $commProduit->getCommission();

            if ($reduc != null) {
                $reduction = $ordreprice;
            } else {
                $reduction = 0;
            }


            $prixTot = $prixSansCommProd + $prixSansCommOp;

            $chiffreAffaire = $prixTot / 1.17;
            //  $chiffreAffaire = number_format($chiffreAffaire, 2, '.', ' ');

        }




        return $chiffreAffaire;
    }
    /**
     * methode
     */
    public function turnoverofprovider($provider)
    {
        $currentDate = new \DateTime();
        $currentYear = date("Y", strtotime($currentDate->format('d-m-Y')));
        $currentMonth = date("m", strtotime($currentDate->format('d-m-Y')));
        $caJanvier = 0;
        $caFevrier = 0;
        $caMars = 0;
        $caAvril = 0;
        $caMay = 0;
        $caJuin = 0;
        $caJuillet = 0;
        $caAout = 0;
        $caSeptembre = 0;
        $caOctobre = 0;
        $caNovembre = 0;
        $caDecembre = 0;
        $chiffreAffaire = 0;
        $cabyprovider = array();
        $chiffreAffaireTotal = 0;




        $allOrdersOfProvider = $this->plannedCleaningRepository->findBy(['Provider' => $provider, "supprime" => null, "valide" => null]);
        foreach ($allOrdersOfProvider as $order) {
            $orderDate = $order->getDate();
            $year = date("Y", strtotime($orderDate->format('d-m-Y')));
            if ($currentYear == $year) {
                $month = date("m", strtotime($orderDate->format('d-m-Y')));
                if ($month == "01") {
                    $caJanvier += $this->chiffredafbyorder($order);
                } elseif ($month == "02") {
                    $caFevrier += $this->chiffredafbyorder($order);
                } elseif ($month == "03") {
                    $caMars += $this->chiffredafbyorder($order);
                } elseif ($month == "04") {
                    $caAvril += $this->chiffredafbyorder($order);
                } elseif ($month == "05") {
                    $caMay += $this->chiffredafbyorder($order);
                } elseif ($month == "06") {
                    $caJuin += $this->chiffredafbyorder($order);
                } elseif ($month == "07") {
                    $caJuillet  += $this->chiffredafbyorder($order);
                } elseif ($month == "08") {
                    $caAout += $this->chiffredafbyorder($order);
                } elseif ($month == "09") {
                    $caSeptembre += $this->chiffredafbyorder($order);
                } elseif ($month == "10") {
                    $caOctobre += $this->chiffredafbyorder($order);
                } elseif ($month == "11") {
                    $caNovembre += $this->chiffredafbyorder($order);
                } elseif ($month == "12") {
                    $caDecembre += $this->chiffredafbyorder($order);
                } else {
                    break;
                }
            }
        }



        $arrData = [
            ["month" => "01", 'ca' => rtrim(rtrim((string)number_format($caJanvier, 2, ".", ""), "0"), ".")],
            ["month" => "02", 'ca' => rtrim(rtrim((string)number_format($caFevrier, 2, ".", ""), "0"), ".")],
            ["month" => "03", 'ca' => rtrim(rtrim((string)number_format($caMars, 2, ".", ""), "0"), ".")],
            ["month" => "04", 'ca' => rtrim(rtrim((string)number_format($caAvril, 2, ".", ""), "0"), ".")],
            ["month" => "05", 'ca' => rtrim(rtrim((string)number_format($caMay, 2, ".", ""), "0"), ".")],
            ["month" => "06", 'ca' => rtrim(rtrim((string)number_format($caJuin, 2, ".", ""), "0"), ".")],
            ["month" => "07", 'ca' => rtrim(rtrim((string)number_format($caJuillet, 2, ".", ""), "0"), ".")],
            ["month" => "08", 'ca' => rtrim(rtrim((string)number_format($caAout, 2, ".", ""), "0"), ".")],
            ["month" => "09", 'ca' => rtrim(rtrim((string)number_format($caSeptembre, 2, ".", ""), "0"), ".")],
            ["month" => "10", 'ca' => rtrim(rtrim((string)number_format($caOctobre, 2, ".", ""), "0"), ".")],
            ["month" => "11", 'ca' => rtrim(rtrim((string)number_format($caNovembre, 2, ".", ""), "0"), ".")],
            ["month" => "12", 'ca' => rtrim(rtrim((string)number_format($caDecembre, 2, ".", ""), "0"), ".")]
        ];

        $chiffreAffaireTotal = $caJanvier + $caFevrier + $caMars + $caAvril + $caMay + $caJuin + $caJuillet + $caAout + $caSeptembre + $caOctobre + $caNovembre + $caDecembre;


        array_push($cabyprovider, ["provider" => $provider, 'data' => $arrData, "total" => rtrim(rtrim((string)number_format($chiffreAffaireTotal, 2, ".", ""), "0"), ".")]);

        return $cabyprovider;
    }
    /**
     * @Route("/turnover", name="turnover")
     */
    public function turnoverbyprovider()
    {

        $providers = $this->providerRepository->allprovider();
        $allres = array();
        $res = "";
        foreach ($providers as $provider) {
            $res = $this->turnoverofprovider($provider);
            array_push($allres, $res);
        }
        $allres = call_user_func_array('array_merge', $allres);

        return $this->render('cms/turnover.html.twig', [

            'cabyprovider' => $allres,

        ]);
    }
    /**
     *
     * @Route("/apiCalendar", name="apiCalendar")
     */
    public function connectGoogleCalendar()
    {


        $promp = "consent";

        $client = new Google_Client();
        $client->setAuthConfig('../src/Mail/credentials.json');
        $client->setScopes(\Google_Service_Calendar::CALENDAR);
        $client->setAccessType('offline');
        $client->setDeveloperKey('AIzaSyBaYtB6Dqw9i7vWLXQ_e5U0dzn2X1FWd3M');
        $client->setPrompt($promp);



        // If there is no previous token or it's expired.
        if ($client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
                // Request authorization from the user.
                $auth_url = $client->createAuthUrl();
                return $this->redirect($auth_url, 301);
            }
        }

        return $this->redirectToRoute('cms_dashboard');
    }
    /**
     *
     * @Route("/passage", name="passage")
     */
    public function passage(Request $request)
    {


        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $calendarArray = array();
        $newApi = new GoogleCalendarApi();
        if (isset($_GET['code'])) {
            $googleCalendar = new CalendarGoogle();
            $googleToken = $_GET['code'];
            $client = $googleCalendar->getClient();
            $client->setAccessToken($googleToken);
            $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $newApi->setIduser($user->getId());
            $user->setGoogleToken(true);
            $newApi->setToken($client->getAccessToken());

            $em->persist($user);
            $em->persist($newApi);
            $em->flush();
        }
        $googleCalendar = new CalendarGoogle();
        $client = $googleCalendar->getClient();
        $accesToken = $newApi->getToken();
        $client->setAccessToken($accesToken);



        return $this->redirectToRoute('cms_dashboard');


    }
    /**
     *
     * @Route("/choosecalendar/{id}", name="choosecalendar")
     */
    public function chooseCalendar(Request $request, $id)
    {


        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $calendarArray = array();
        $googleCalendarConnected = $this->googleCalendarApiRepository->findOneBy(['id' => $id]);
        $accesToken = $googleCalendarConnected->getToken();

        $googleCalendar = new CalendarGoogle();
        $client = $googleCalendar->getClient();
        $client->setAccessToken($accesToken);

        $calendarList = $googleCalendar->getAllCalendar($client);
        foreach ($calendarList as $calendarName) {
            $name = $calendarName->getSummary();
            $id = $calendarName->getId();
            array_push($calendarArray, ['name' => $name, 'calendarId' => $id]);
        }
        if ($request->isMethod('POST')) {
            $calendarId = $_POST['calendar'];

            $googleCalendarConnected->setCalendarId($calendarId);

            $em->persist($googleCalendarConnected);

            $em->flush();
            return $this->redirectToRoute('cms_dashboard');

        }




        return $this->render('cms/choosecalendar.html.twig', [

            'calendarArray' => $calendarArray,

        ]);
    }
}
