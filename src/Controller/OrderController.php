<?php

namespace App\Controller;

use App\Repository\PlannedCleaningOptionsRepository;
use App\Repository\PlannedCleaningRepository;
use App\Repository\PlaningRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use App\Mail\ReponseMail;

/**
 * @Route("/order", name="order_")
 * @Security("is_granted('ROLE_COMPANY_ADMIN') or is_granted('ROLE_WORKER')")
 */
class OrderController extends AbstractController
{



    private  $plannedCleaningRepository;
    private $planingRepository;

    public function __construct(\Swift_Mailer $mailer, PlannedCleaningRepository $plannedCleaningRepository, PlannedCleaningOptionsRepository $plannedCleaningOptionsRepository, PlaningRepository $planingRepository)
    {
        $this->mailer = $mailer;
        $this->plannedCleaningRepository = $plannedCleaningRepository;
        $this->planingRepository = $planingRepository;
        $this->plannedCleaningOptionsRepository = $plannedCleaningOptionsRepository;
    }


    /**
     * @Route("/", name="list")
     */
    public function index()
    {
        $user = $this->getUser();
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $nonvalide = $this->plannedCleaningRepository->findNonValide();
            return $this->render('order/list.html.twig', [
                'Orders' => $this->plannedCleaningRepository->findBy(['valide' => null,'supprime' => null], ['date' => 'DESC']),
                'nonvalide' => $nonvalide
            ]);
        } elseif ($this->get('security.authorization_checker')->isGranted('ROLE_WORKER_ADMIN')) {
            $nonvalide = null;
            return $this->render('order/list.html.twig', [
                'Orders' => $this->plannedCleaningRepository->findForAdminWorker($user->getProvider()),
                'nonvalide' => $nonvalide
            ]);
        } elseif ($this->get('security.authorization_checker')->isGranted('ROLE_WORKER')) {
            $nonvalide = null;
            return $this->render('order/list.html.twig', [
                'Orders' => $this->planingRepository->findBy(['user' => $user->getId(), 'supprime' => null]),
                'nonvalide' => $nonvalide
            ]);
        } else {

            $nonvalide = null;
            return $this->render('order/list.html.twig', [
                'Orders' => $this->plannedCleaningRepository->findByParking($user->getCodeCompany()),
                'nonvalide' => $nonvalide
            ]);
        }
    }

    /**
     * @Route("/notif/{id}", name="notif")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function notif(Request $request, int $id)
    {
        $order = $this->plannedCleaningRepository->findOneBy(['id' => $id]);

        $dateOrder = $order->getDate();

        $from = $order->getPlannedStart();
        $to = $order->getPlannedEnd();

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
            if($from / 60 < 10)
            {
                $from = "0" . floor($from / 60) . ":" . $minstart;
            }
            else
            {
                $from = floor($from / 60) . ":" . $minstart;
            }
            if($to / 60 < 10)
            {
                $to = "0" . floor($to / 60) . ":" . $minend;
            }
            else
            {
                $to = floor($to / 60) . ":" . $minend;
            }

        $car="";

        if($order->getUserCarId()!=null)
        {
            $brand = $order->getUserCarId()->getUserHasCarIdCar()->getBrandCar();
            $model = $order->getUserCarId()->getUserHasCarIdCar()->getModelCar();
            $carname = $order->getUserCarId()->getUserHasCarNicknameCar();

            $car = $brand . '/' . $model . '/' . $carname;
        }

        $message = new ReponseMail();
        $message->sendNotif($order->getUserid()->getEmail(), $dateOrder->format('m-d-Y'), $from, $to, $car);

        return $this->redirectToRoute("order_list");
    }


    /**
     * @Route("/delete", name="delete")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function delete(Request $request)
    {
        $nonvalide = $this->plannedCleaningRepository->findNonValide();
        $em = $this->getDoctrine()->getManager();
        foreach ($nonvalide as $order) {
            foreach ($order->getPlannedCleaningOptions() as $options) {
                $em->remove($options);
            }
            $order->setSupprime(1);
        }
        $em->flush();

        return $this->redirectToRoute("order_list");
    }
    /**
     * @Route("/nonva", name="nonva")
     */
    public function nonValide()
    {
        return $this->render('order/list.html.twig', [
            'Orders' => $this->plannedCleaningRepository->findNonValide(),
            'nonvalide' => $this->plannedCleaningRepository->findNonValide()
        ]);
    }
    /**
     * @Route("/{id}/valider", name="valider")
     */
    public function valider(int $id)
    {
        $em = $this->getDoctrine()->getManager();
        $plannedCleaning = $this->plannedCleaningRepository->findOneBy(['id' => $id]);
        $plannedCleaning->setValide(Null);
        $em->persist($plannedCleaning);
        $em->flush();

        return $this->redirectToRoute('order_list');
    }
}
