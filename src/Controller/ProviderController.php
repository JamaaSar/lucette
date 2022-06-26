<?php

namespace App\Controller;


use App\Entity\Option;
use App\Entity\Products;
use App\Entity\Provider;
use App\Entity\Categories;
use App\Entity\CategoryProvider;
use App\Form\ProviderType;
use App\Mail\ReponseMail;
use App\Entity\EventsFromGCalendar;

use App\Mail\CalendarGoogle;
use App\Repository\AvailabilityRepository;
use App\Repository\MooveeUsersRepository;
use App\Repository\ParkingsRepository;
use App\Repository\ProviderRepository;
use App\Repository\CategoryProviderRepository;
use App\Repository\PlannedCleaningRepository;
use App\Repository\EventsFromGCalendarRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;




/**
 * @Route("/provider", name="provider_")
 * 
 */
class ProviderController extends AbstractController
{

    private $providerRepository;
    private $mooveeUsersRepository;
    private $parkingsRepository;
    private $categoryProviderRepository;
    private $plannedCleaningRepository;
    private $availabilityRepository;
    private $eventsFromGCalendarRepository;


    public function __construct(
        ProviderRepository $providerRepository,
        MooveeUsersRepository $mooveeUsersRepository,
        ParkingsRepository $parkingsRepository,
        CategoryProviderRepository $categoryProviderRepository,
        PlannedCleaningRepository $plannedCleaningRepository,
        AvailabilityRepository $availabilityRepository,
        EventsFromGCalendarRepository $eventsFromGCalendarRepository
    ) {
        $this->providerRepository = $providerRepository;
        $this->mooveeUsersRepository = $mooveeUsersRepository;
        $this->parkingsRepository = $parkingsRepository;
        $this->categoryProviderRepository = $categoryProviderRepository;
        $this->plannedCleaningRepository = $plannedCleaningRepository;
        $this->availabilityRepository = $availabilityRepository;
        $this->eventsFromGCalendarRepository = $eventsFromGCalendarRepository;
    }

    /**
     * @Route("", name="list")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function list()
    {
        return $this->render('provider/list.html.twig', [
            'providers' => $this->providerRepository->findBy(['supprime' => Null]),

        ]);
    }

    /**
     * @Route("/detail/{id}", name="detail")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function detail(int $id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $currentprovider = $this->providerRepository->findOneBy(['id' => $id]);
        $userByProvider = $this->mooveeUsersRepository->findWorkers($currentprovider);
        $parkings = $this->parkingsRepository->findAll();
        $catProvider = $this->categoryProviderRepository->categoryByProvider($currentprovider);

        $form = $this->createForm(ProviderType::class, $currentprovider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('success', 'The provider has been successfully edited!');
            $em->flush();
            return $this->redirectToRoute('provider_list');
        }
        return $this->render('provider/detail.html.twig', [
            'form' => $form->createView(),
            'clients' => $userByProvider,
            'provider' => $currentprovider,
            "parkings" =>  $parkings,
            'catProvider' => $catProvider
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit(int $id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $currentprovider = $this->providerRepository->findOneBy(['id' => $id]);
        $form = $this->createForm(ProviderType::class, $currentprovider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('success', 'The provider has been successfully edited!');
            $em->flush();
            return $this->redirectToRoute('provider_list');
        }
        return $this->render('provider/edit.html.twig', [
            'form' => $form->createView(),
            'provider' => $currentprovider,

        ]);
    }

    /**
     * @Route("/detail/{id}/listdesworker", name="listdesworker" )
     */
    public function listdesworker(Request $request, int $id)
    {
        $em = $this->getDoctrine()->getManager();
        $currentprovider = $this->providerRepository->findOneBy(['id' => $id]);
        $listUsers = $this->mooveeUsersRepository->getAllWorkers();

        if ($request->isMethod('POST')) {

            $this->addFlash('success', 'The worker has been successfully added!');
            $newUs = $request->request->get('user_id');
            $userW = $this->mooveeUsersRepository->find($newUs);
            $userW->setProvider($currentprovider);
            $em->persist($userW);
            $em->flush();

            return $this->redirectToRoute('provider_detail', array('id' => $id));
        }


        return $this->render('provider/listdesworker.html.twig', [
            'provider' => $currentprovider,
            'clients' => $listUsers,
        ]);
    }

    /**
     * @Route("/add", name="add")
     */
    public function add(Request $request)
    {
        $newprovider = (new Provider());

        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(ProviderType::class, $newprovider);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {


            $em->persist($newprovider);
            $em->flush();
            $this->addFlash('success', 'The provider has been successfully added!');
            return $this->redirectToRoute('provider_list');
        }

        return $this->render('provider/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(int $id)
    {
        $this->addFlash('success', 'The provider has been successfully deleted!');
        $em = $this->getDoctrine()->getManager();
        $delprovider = $em->getRepository(Provider::class)->find($id);
        $delproduct = $em->getRepository(Products::class)->findby(['id_provider' => $id]);

        foreach ($delproduct as $product) {
            $options = $em->getRepository(Option::class)->findby(['id_product' => $product->getId()]);
            foreach ($options as $option) {
                $option->setSupprime(1);
            }
            $product->setSupprime(1);
        }
        
        foreach ($delproduct as $product){

            $options= $em->getRepository(Option::class)->findby(['id_product' => $product->getId()]);
            $catProduct = $em->getRepository(CategoryProduct::class)->findby(['id_product' => $product->getId()]);
            foreach ($options as $option){
                $option->getCategoryOption()->clear();
                $sup = $em->merge($option);
                $em->remove($option);
            }

            foreach ($catProduct as $catproduct){
                $em->remove($catproduct);
            }
            $em->remove($product);
        }
        $em->remove($delprovider);
    

        $delprovider->setSupprime(1);
        $em->persist($delprovider);
        $em->flush();

        return $this->redirectToRoute('provider_list');
    }


    /**
     * @Route("/detail/{id}/addcatprovider", name="addcatprovider")
     *  @Security("has_role('ROLE_WORKER_ADMIN')")
     */
    public function addCatToProvider(Request $request, int $id)
    {
        $em = $this->getDoctrine()->getManager();
        $currentprovider = $this->providerRepository->findOneBy(['id' => $id]);
        $newcategory = new CategoryProvider();

        $form = $this->createFormBuilder($newcategory)
            ->add(
                'idcategory',
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
            $newcategory->setIdProvider($currentprovider);
            $em->persist($newcategory);
            $em->flush();
            $this->addFlash('success', 'The category has been successfully added!');
            return $this->redirectToRoute('provider_detail', ['id' => $id]);
        }

        return $this->render('provider/addcatprovider.html.twig', [
            'form' => $form->createView(),
            'provider' => $currentprovider,

        ]);
    }
    /**
     * @Route("/waitlist", name="waitlist")
     */
    public function waitlist(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $currentprovider = $this->getUser()->getProvider();
        $user = $this->getUser();
        $plannedCleaning = "";


        if ($this->isGranted('ROLE_WORKER_ADMIN')) {
            $plannedCleaning = $this->plannedCleaningRepository->findBy(['Provider' => $currentprovider, 'captured' => 1, 'valide' => 1, "edited" => null, 'supprime' => null]);
        }

        if ($this->isGranted('ROLE_ADMIN')) {
            $plannedCleaning = $this->plannedCleaningRepository->findBy(['captured' => 1, 'valide' => 1, 'supprime' => null]);
        }

        return $this->render('provider/waitlist.html.twig', [
            'provider' => $currentprovider,
            'plannedCleaning' => $plannedCleaning

        ]);
    }
    /**
     * @Route("/editedwaitlist", name="editedwaitlist")
     */
    public function editedWaitlist(Request $request)
    {

        $currentprovider = $this->getUser()->getProvider();
        $user = $this->getUser();


        if ($this->isGranted('ROLE_WORKER_ADMIN')) {
            $plannedCleaning = $this->plannedCleaningRepository->findBy(['Provider' => $currentprovider->getId(), 'captured' => 1, 'valide' => 1, 'supprime' => null]);
        }
        if ($this->isGranted('ROLE_USER')) {
            $plannedCleaning = $this->plannedCleaningRepository->findBy(['userid' => $user->getId(), 'captured' => 1, 'edited' => 1, 'supprime' => null]);
        }
        if ($this->isGranted('ROLE_ADMIN')) {
            $plannedCleaning = $this->plannedCleaningRepository->findBy(['captured' => 1, 'valide' => 1, 'supprime' => null]);
        }

        return $this->render('provider/waitlist.html.twig', [
            'provider' => $currentprovider,
            'plannedCleaning' => $plannedCleaning

        ]);
    }

    /**
     * @Route("/useraccepted/{id}", name="useraccept")
     */
    public function captureByUser($id)
    {
        //confirm by user
        $plannedCleaning = $this->plannedCleaningRepository->findOneBy(['id' => $id]);
        $this->capturePayment($plannedCleaning);
        //$this->sendCaptureSmsToProvider($plannedCleaning);
        //$this->sendCaptureSmsToUser($plannedCleaning);
        return $this->redirectToRoute('planned_services_list');
    }
    /**
     * @Route("/provideraccepted/{id}", name="provideraccepted")
     */
    public function captureByProvider($id)
    {

        $plannedCleaning = $this->plannedCleaningRepository->findOneBy(['id' => $id]);
        $this->capturePayment($plannedCleaning);
        //$this->sendCaptureSmsToUser($plannedCleaning);

        return $this->redirectToRoute('provider_waitlist');
    }
    /**
     * @Route("/provideracceptedmail/{id}", name="provideracceptedmail")
     */
    public function captureByProviderFrommail($id)
    {

        $plannedCleaning = $this->plannedCleaningRepository->findOneBy(['id' => $id]);
        $this->capturePayment($plannedCleaning);
        //$this->sendCaptureSmsToUser($plannedCleaning);

        return $this->redirectToRoute('provider_waitlist');
    }

    /**
     * @Route("/usercanceled/{id}", name="usercanceled")
     */
    public function cancelByUser($id)
    {
        $plannedCleaning = $this->plannedCleaningRepository->findOneBy(['id' => $id]);
        $this->cancelPayment($plannedCleaning);
        //$this->sendCancelSmsToProvider($plannedCleaning);
        return $this->redirectToRoute('planned_services_list');
    }
    /**
     * @Route("/providercanceled/{id}", name="providercanceled")
     */
    public function cancelByProvider(Request $request, $id)
    {
        $plannedCleaning = $this->plannedCleaningRepository->findOneBy(['id' => $id]);
        $form = $this->createFormBuilder($plannedCleaning)
            ->add(
                'message',
                TypeTextType::class,
                [
                    'label' => 'Message to client',
                ]
            )
            ->add('cancel', SubmitType::class, ['label' => 'Cancel'])

            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var ClickableInterface $cancelButton  */
            $cancelButton = $form->get('cancel');
            if ($cancelButton->isClicked()) {
                $textMessage = $form->getData()->getMessage();
                $this->cancelPayment($plannedCleaning);
                //$this->sendCancelSmsToUser($plannedCleaning, $textMessage);
                return $this->redirectToRoute('provider_waitlist');
            }
        }
        return $this->render('provider/cancelordrebyprovider.html.twig', [
            'form' => $form->createView(),
            'plannedCleaning' => $plannedCleaning

        ]);
    }

    /**
     * @Route("/provideredited/{id}", name="provideredited")
     */
    public function editByProvider(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $plannedCleaning = $this->plannedCleaningRepository->findOneBy(['id' => $id]);
        $client = $this->mooveeUsersRepository->findOneBy(["id" => $plannedCleaning->getUserid()]);
        $laDate = $plannedCleaning->getDate()->format('d-m-Y');
        $time = $this->calculeFromTo($plannedCleaning);
        $form = $this->createFormBuilder($plannedCleaning)
            ->add('date', DateType::class, [
                'label' => 'Date',
                'widget' => 'single_text',
            ])
            ->add('from', TimeType::class, [
                'label' => 'From',
                'widget' => 'single_text',
            ])
            ->add(
                'to',
                TimeType::class,
                [
                    'label' => 'To',
                    'widget' => 'single_text',
                ]
            )
            ->add(
                'message',
                TypeTextType::class,
                [
                    'label' => 'Message to client',
                ]
            )
            ->add('update', SubmitType::class, ['label' => 'Update'])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var ClickableInterface $updateButton  */

            $updateButton = $form->get('update');
            if ($updateButton->isClicked()) {
                $newStart = $form->getData()->getFrom()->format('H:i');
                $newEnd = $form->getData()->getTo()->format('H:i');
                $newDate = $form->getData()->getDate();
                $textMessage = $form->getData()->getMessage();

                $newDate = $newDate->format('d-m-Y');

                $heuredeb = explode(":", $newStart);
                $minutesdeb = ($heuredeb[0] * 60) + $heuredeb[1];
                $heurefin = explode(":", $newEnd);
                $minutesfin = ($heurefin[0] * 60) + $heurefin[1];


                if ($newDate == $laDate && $time[0][0] == $newStart && $time[0][1] == $newEnd) {
                    //$this->sendCaptureSmsToUser($plannedCleaning);
                } else {
                    $plannedCleaning->setPlannedStart($minutesdeb);
                    $plannedCleaning->setPlannedEnd($minutesfin);
                    $plannedCleaning->setEdited(1);
                    $em->persist($plannedCleaning);
                    $em->flush();
                    $message = new ReponseMail();
                    $message->sendMailToUser($client->getEmail(), ($plannedCleaning->getDate())->format('d-m-Y'), $time[0][0], $time[0][1], $newDate, $newStart, $newEnd, $textMessage);

                    $providers = $this->mooveeUsersRepository->findAdminWorkerByProvider($plannedCleaning->getProvider());
                    $eventName = preg_replace('/\s/', '', ($plannedCleaning->getId() . "" . strtolower($plannedCleaning->getParkingId()->getName())));
                   // $myEvent = $this->eventsFromGCalendarRepository->findOneBy(['event_name' => $eventName]);
                    $startTime = $newDate->format('Y-m-d') . " " . $newStart;
                    $endTime = $newDate->format('Y-m-d') . " " . $newEnd;
                    date_default_timezone_set('Europe/Luxembourg');
                   /* try {
                        if ($providers != null) {
                            foreach ($providers as $provider) {
                                if ($provider->getGoogleToken() != null) {
                                    $googleToken = $this->googleCalendarApiRepository->findOneBy(['iduser' => $provider->getId()]);
                                    $googleCalendar = new CalendarGoogle();
                                    $client = $googleCalendar->getClient();
                                    $client->setAccessToken($googleToken->getToken());
                                    $event = $googleCalendar->getEvent($client, $googleToken->getCalendarId(), $myEvent->getEventId());
                                    $start = new \Google_Service_Calendar_EventDateTime();
                                    $start->setDateTime(date('Y-m-d\TH:i:sP', strtotime($startTime)));
                                    $event->setStart($start);
                                    $end = new \Google_Service_Calendar_EventDateTime();
                                    $end->setDateTime(date('Y-m-d\TH:i:sP', strtotime($endTime)));
                                    $event->setEnd($end);
                                    $googleCalendar->update($client, $googleToken->getCalendarId(), $event);
                                    //show availability
                                }
                            }
                        }  
                        if ($user->getGoogleToken() != null) {
                            $googleToken = $this->googleCalendarApiRepository->findOneBy(['iduser' => $user->getId()]);

                            $googleCalendar = new CalendarGoogle();
                            $client = $googleCalendar->getClient();
                            $client->setAccessToken($googleToken->getToken());
                            $event = $googleCalendar->getEvent($client, $googleToken->getCalendarId(), $myEvent->getEventId());
                            $start = new \Google_Service_Calendar_EventDateTime();
                            $start->setDateTime(date('Y-m-d\TH:i:sP', strtotime($startTime)));
                            $event->setStart($start);
                            $end = new \Google_Service_Calendar_EventDateTime();
                            $end->setDateTime(date('Y-m-d\TH:i:sP', strtotime($endTime)));
                            $event->setEnd($end);
                            $googleCalendar->update($client, $googleToken->getCalendarId(), $event);
                        }
                    } catch (\Exception $e) {
                        $this->addFlash('', ' But we couldn\'nt delete a event from your calendar');
                    } */
                } 
            }
            return $this->redirectToRoute('provider_waitlist');
        }
        return $this->render('provider/editordrebyprovider.html.twig', [
            'form' => $form->createView(),
            'plannedCleaning' => $plannedCleaning,
            'start' => $time[0][0],
            'end' => $time[0][1],


        ]);
    }
    /**
     * @Route("/modifier/{id}", name="modifier")
     */
    public function modifier(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $listofpc = array();
        $timeofpc = "";
        $plannedTime = array();
        $res = array();
        $plannedCleaning = $this->plannedCleaningRepository->findOneBy(['id' => $id]);


        $client = $this->mooveeUsersRepository->findOneBy(["id" => $plannedCleaning->getUserid()]);

        $availabilities = $this->availabilityRepository->findIncommingByProvider($plannedCleaning->getProvider());
        foreach ($availabilities as $avaible) {

            $allplannedCleaning = $this->plannedCleaningRepository->findBy(['date' => $avaible->getDate(), 'Provider' => $plannedCleaning->getProvider(), 'supprime' => null]);

            array_push($res, ["avaible" => $avaible, "plannedTime" => $this->calculePlannedTime($allplannedCleaning)]);
        }

        $laDate = $plannedCleaning->getDate()->format('d-m-Y');
        $time = $this->calculeFromTo($plannedCleaning);

        $form = $this->createFormBuilder($plannedCleaning)
            ->add('date', DateType::class, [
                'label' => 'Date',
                'widget' => 'single_text',
            ])
            ->add('from', TimeType::class, [
                'label' => 'From',
                'widget' => 'single_text',
            ])
            ->add(
                'to',
                TimeType::class,
                [
                    'label' => 'To',
                    'widget' => 'single_text',
                ]
            )
            ->add(
                'message',
                TypeTextType::class,
                [
                    'label' => 'Message to client',
                ]
            )
            ->add('update', SubmitType::class, ['label' => 'Update'])
            ->add('cancel', SubmitType::class, ['label' => 'Cancel'])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var ClickableInterface $updateButton  */

            $updateButton = $form->get('update');
            if ($updateButton->isClicked()) {
                $newStart = $form->getData()->getFrom()->format('H:i');
                $newEnd = $form->getData()->getTo()->format('H:i');
                $newDate = $form->getData()->getDate();
                $textMessage = $form->getData()->getMessage();

                $newDate = $newDate->format('d-m-Y');

                $heuredeb = explode(":", $newStart);
                $minutesdeb = ($heuredeb[0] * 60) + $heuredeb[1];
                $heurefin = explode(":", $newEnd);
                $minutesfin = ($heurefin[0] * 60) + $heurefin[1];


                if ($newDate == $laDate && $time[0][0] == $newStart && $time[0][1] == $newEnd) {
                    //$this->sendCaptureSmsToUser($plannedCleaning);
                } else {
                    $plannedCleaning->setPlannedStart($minutesdeb);
                    $plannedCleaning->setPlannedEnd($minutesfin);
                    $plannedCleaning->setEdited(1);
                    $em->persist($plannedCleaning);
                    $em->flush();
                    $message = new ReponseMail();
                    $message->sendMailToUser($client->getEmail(), ($plannedCleaning->getDate())->format('d-m-Y'), $time[0][0], $time[0][1], $newDate, $newStart, $newEnd, $textMessage);

                    $providers = $this->mooveeUsersRepository->findAdminWorkerByProvider($plannedCleaning->getProvider());
                    $eventName = preg_replace('/\s/', '', ($plannedCleaning->getId() . "" . strtolower($plannedCleaning->getParkingId()->getName())));
                    //$myEvent = $this->eventsFromGCalendarRepository->findOneBy(['event_name' => $eventName]);
                    $startTime = $newDate->format('Y-m-d') . " " . $newStart;
                    $endTime = $newDate->format('Y-m-d') . " " . $newEnd;
                    date_default_timezone_set('Europe/Luxembourg');
                    /*try {
                        if ($providers != null) {
                            foreach ($providers as $provider) {
                                if ($provider->getGoogleToken() != null) {
                                    $googleToken = $this->googleCalendarApiRepository->findOneBy(['iduser' => $provider->getId()]);
                                    $googleCalendar = new CalendarGoogle();
                                    $client = $googleCalendar->getClient();
                                    $client->setAccessToken($googleToken->getToken());
                                    $event = $googleCalendar->getEvent($client, $googleToken->getCalendarId(), $myEvent);
                                    $start = new \Google_Service_Calendar_EventDateTime();
                                    $start->setDateTime(date('Y-m-d\TH:i:sP', strtotime($startTime)));
                                    $event->setStart($start);
                                    $end = new \Google_Service_Calendar_EventDateTime();
                                    $end->setDateTime(date('Y-m-d\TH:i:sP', strtotime($endTime)));
                                    $event->setEnd($end);
                                    $googleCalendar->update($client, $googleToken->getCalendarId(), $event);
                                    //show availability
                                }
                            }
                        }
                        $user = $this->getUser();
                        $googleToken = $user->getGoogleToken();
                        if ($googleToken != null) {

                            $googleCalendar = new CalendarGoogle();
                            $client = $googleCalendar->getClient();
                            $client->setAccessToken($googleToken->getToken());
                            $event = $googleCalendar->getEvent($client, $googleToken->getCalendarId(), $myEvent);
                            $start = new \Google_Service_Calendar_EventDateTime();
                            $start->setDateTime(date('Y-m-d\TH:i:sP', strtotime($startTime)));
                            $event->setStart($start);
                            $end = new \Google_Service_Calendar_EventDateTime();
                            $end->setDateTime(date('Y-m-d\TH:i:sP', strtotime($endTime)));
                            $event->setEnd($end);
                            $googleCalendar->update($client, $googleToken->getCalendarId(),  $event);
                        }
                    } catch (\Exception $e) {
                        $this->addFlash('', ' But we couldn\'nt delete a event from your calendar');
                    }*/
                }
            }
            /** @var ClickableInterface $cancelButton  */
            $cancelButton = $form->get('cancel');
            if ($cancelButton->isClicked()) {
                $textMessage = $form->getData()->getMessage();
                $this->cancelPayment($plannedCleaning);
                //$this->sendCancelSmsToUser($plannedCleaning, $textMessage);
                return $this->redirectToRoute('provider_waitlist');
            }
            return $this->redirectToRoute('provider_waitlist');
        }

        return $this->render('provider/modifierdate.html.twig', [
            'form' => $form->createView(),
            'plannedCleaning' => $plannedCleaning,
            'start' => $time[0][0],
            'end' => $time[0][1],
            'listofplannedc' => $res

        ]);
    }

    /*******************************Capture*********************/
    public function capturePayment($plannedCleaning)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        \Stripe\Stripe::setApiKey($this->getParameter('private_key_stripe'));
        //then get transactiontoken (here transactiontoken is paymentintent id)
        $chargeid = $plannedCleaning->getTransactionToken();
        //find payment by id
        $charge = \Stripe\PaymentIntent::retrieve($chargeid);

        //capture all payment 
        $charge->capture();
        $plannedCleaning->setValide(null);
        $plannedCleaning->setCapture(null);
        $plannedCleaning->setTransactionToken($charge->id);
        $time = $this->calculeFromTo($plannedCleaning);


        /********************************************* Google Calendar API *********************************************/
 /*       $providers = $this->mooveeUsersRepository->findAdminWorkerByProvider($plannedCleaning->getProvider());
        $eventName = preg_replace('/\s/', '', ($plannedCleaning->getId() . "" . strtolower($plannedCleaning->getParkingId()->getName())));
        $startTime = $plannedCleaning->getDate()->format('Y-m-d') . " " . $time[0][0];
        $endTime = $plannedCleaning->getDate()->format('Y-m-d') . " " . $time[0][1];
        date_default_timezone_set('Europe/Luxembourg');

        if ($providers != null) {
            foreach ($providers as $provider) {
                if ($provider->getGoogleToken() != null) {
                    $googleToken = $this->googleCalendarApiRepository->findOneBy(['iduser' => $provider->getId()]);
                    $googleCalendar = new CalendarGoogle();
                    $client = $googleCalendar->getClient();
                    $client->setAccessToken($googleToken->getToken());
                    $newEvent = $googleCalendar->addEvent($googleToken->getCalendarId(), $client, 'Reservation', $plannedCleaning->getParkingId()->getAddress(), date('Y-m-d\TH:i:sP', strtotime($startTime)), date('Y-m-d\TH:i:sP', strtotime($endTime)), "6");
                    $this->saveEventToGCalendar($eventName, $user->getId(), $newEvent->getId(), $googleToken->getCalendarId());

                }
            }
        }

        if ($user->getGoogleToken() != null) {
            $googleToken = $this->googleCalendarApiRepository->findOneBy(['iduser' => $user->getId()]);
            $googleCalendar = new CalendarGoogle();
            $client = $googleCalendar->getClient();
            $client->setAccessToken($googleToken->getToken());
            $newEvent = $googleCalendar->addEvent($googleToken->getCalendarId(),  $client, 'Reservation', $plannedCleaning->getParkingId()->getAddress(), date('Y-m-d\TH:i:sP', strtotime($startTime)), date('Y-m-d\TH:i:sP', strtotime($endTime)), "6");
            $this->saveEventToGCalendar($eventName, $user->getId(), $newEvent->getId(), $googleToken->getCalendarId());


         
        }*/
        $em->persist($plannedCleaning);
        $em->flush();

        return null;
    }
    public function saveEventToGCalendar($eventName, $user, $newEventId, $calendarId)
    {
        $em = $this->getDoctrine()->getManager();
        $gCalendarEvent = new  EventsFromGCalendar();
        $gCalendarEvent->setEventName($eventName);
        $gCalendarEvent->setUserId($user);
        $gCalendarEvent->setEventId($newEventId);
        $gCalendarEvent->setGoogleCalendarId($calendarId);
        $em->persist($gCalendarEvent);
        $em->flush();
    }

    public function sendCaptureSmsToProvider($plannedCleaning)
    {
        $time = $this->calculeFromTo($plannedCleaning);
        $laDate = $plannedCleaning->getDate();
        $provider = $this->mooveeUsersRepository->findOneBy(['Provider' => $plannedCleaning->getProvider()]);
        $dateOfService = $laDate->format('m-d-Y') . ' - ' . $time[0][0] . ' to ' . $time[0][1];
        $message = new ReponseMail();
        $message->sendConfirmMailToProvider($provider->getEmail(), $dateOfService);
    }
    public function sendCaptureSmsToUser($plannedCleaning)
    {
        $time = $this->calculeFromTo($plannedCleaning);
        $facture = $plannedCleaning->getFacture();
        $laDate = $plannedCleaning->getDate();
        $user = $this->mooveeUsersRepository->findOneBy(['id' => $plannedCleaning->getUserid()]);
        $dateOfService = $laDate->format('m-d-Y') . ' - ' . $time[0][0] . ' to ' . $time[0][1];
        $price = $plannedCleaning->getPricePaid();
        $message = new ReponseMail();
        $message->sendReservation($user->getEmail(), $facture, $dateOfService, $plannedCleaning->getProduit()->getName(), $plannedCleaning->getProduit()->getOption(), number_format($price, 2, ' . ', ', '));
    }

    /*******************************Cancel*********************/
    public function cancelPayment($plannedCleaning)

    {
        $em = $this->getDoctrine()->getManager();
        \Stripe\Stripe::setApiKey($this->getParameter('private_key_stripe'));
        //then get transactiontoken (here transactiontoken is paymentintent id)
        $chargeid = $plannedCleaning->getTransactionToken();
        //find payment by id
        $charge = \Stripe\PaymentIntent::retrieve($chargeid);

        //capture all payment 
        $charge->cancel();
        $plannedCleaning->setTransactionToken($charge->id);
        $plannedCleaning->setValide(1);
        $plannedCleaning->setCapture(0);
        $plannedCleaning->setSupprime(1);

        $providers = $this->mooveeUsersRepository->findAdminWorkerByProvider($plannedCleaning->getProvider());
        $eventName = preg_replace('/\s/', '', ($plannedCleaning->getId() . "" . strtolower($plannedCleaning->getParkingId()->getName())));
        /*$myEvent = $this->eventsFromGCalendarRepository->findOneBy(['event_name' => $eventName]);


        try {
            if ($providers != null) {
                foreach ($providers as $provider) {
                    if ($provider->getGoogleToken() != null) {
                        $googleToken = $this->googleCalendarApiRepository->findOneBy(['iduser' => $provider->getId()]);
                        $googleCalendar = new CalendarGoogle();
                        $client = $googleCalendar->getClient();
                        $client->setAccessToken($googleToken->getToken());
                        $googleCalendar->delete($client, $googleToken->getCalendarId(),  $myEvent);
                    }
                }
            }
            $user = $this->getUser();

            if ($user->getGoogleToken() != null) {
                $googleToken = $this->googleCalendarApiRepository->findOneBy(['iduser' => $user->getId()]);
                $googleCalendar = new CalendarGoogle();
                $client = $googleCalendar->getClient();
                $client->setAccessToken($googleToken->getToken());
                $googleCalendar->delete($client, $googleToken->getCalendarId(),  $myEvent);
            }
        } catch (\Exception $e) {
            $this->addFlash('success', 'The order has been successfully deleted! But we couldn\'nt delete a event from your calendar');
        } */


        $em->persist($plannedCleaning);
        $em->flush();

        return null;
    }
    public function sendCancelSmsToProvider($plannedCleaning)
    {
        $provider = $this->mooveeUsersRepository->findOneBy(['Provider' => $plannedCleaning->getProvider()]);
        $time = $this->calculeFromTo($plannedCleaning);
        $message = new ReponseMail();
        $message->sendCancelMailToProvider($provider->getEmail(), ($plannedCleaning->getDate())->format('m-d-Y'), $time[0][0], $time[0][1]);
    }
    public function sendCancelSmsToUser($plannedCleaning, $msg)
    {
        $user = $this->mooveeUsersRepository->findOneBy(['id' => $plannedCleaning->getUserid()]);
        $time = $this->calculeFromTo($plannedCleaning);

        $message = new ReponseMail();
        $message->sendCancelMailToUser($user->getEmail(), ($plannedCleaning->getDate())->format('m-d-Y'), $time[0][0], $time[0][1], $msg);
    }

    public function calculeFromTo($plannedCleaning)
    {

        $array = array();
        $from = $plannedCleaning->getPlannedStart();
        $to = $plannedCleaning->getPlannedEnd();

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
        if(floor($from / 60)%24 < 10)
        {
            $from = "0" . floor($from / 60) . ":" . $minstart;
        }
        else
        {
            $from = floor($from / 60) . ":" . $minstart;
        }
        if(floor($to / 60)%24 < 10)
        {
            $to = "0" . floor($to / 60) . ":" . $minend;
        }
        else
        {
            $to = floor($to / 60) . ":" . $minend;
        }
        array_push($array, [$from, $to]);

        return $array;
    }

    public function calculePlannedTime($plannedCleaning)
    {

        $plannedTime = array();
        $res = array();
        foreach ($plannedCleaning as $pl) {
            $facture = $pl->getFacture();
            if ($facture != null) {
                $res = $this->calculeFromTo($pl);
                array_push($plannedTime, ['start' => $res[0][0], 'end' => $res[0][1]]);
            }
        }

        return $plannedTime;
    }
}
