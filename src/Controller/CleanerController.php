<?php

namespace App\Controller;

use App\Entity\MooveeUsers;
use App\Entity\Planing;
use App\Entity\PlannedCleaning;
use App\Form\HorraireType;
use App\Mail\CalendarGoogle;
use App\Repository\MooveeUsersRepository;
use App\Repository\PlaningRepository;
use App\Repository\PlannedCleaningRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;




/**
 * This controller is for planned services "Dashboard : section Planning
 * index : list of all planned services showing in the calendar
 * detail : show a detail of the clicked planned service
 * edit : edit a date of planned service
 * deleteorder : delete planned service
 * add : add a worker to a clicked service
 * delete : delete from table Planning
 */

/**
 * @Route("/cleaner", name="cleaner_")
 * @Security("has_role('ROLE_WORKER')")
 */
class CleanerController extends AbstractController
{

    private $plannedCleaningRepository;
    private $planingRepository;
    private $mooveeUsersRepository;

    public function __construct(PlannedCleaningRepository $plannedCleaningRepository, PlaningRepository $planingRepository, MooveeUsersRepository $mooveeUsersRepository)
    {
        $this->plannedCleaningRepository = $plannedCleaningRepository;
        $this->planingRepository = $planingRepository;
        $this->mooveeUsersRepository = $mooveeUsersRepository;
    }

    /**
     * @Route("/", name="calendar")
     */
    public function index()
    {
        $user =  $this->getUser();
        if ($this->isGranted('ROLE_ADMIN')) {
            $planing = $this->plannedCleaningRepository->findBy(['valide' => null, 'supprime' => null]);
        } elseif ($this->isGranted('ROLE_WORKER_ADMIN')) {
            $planing = $this->plannedCleaningRepository->findBy(['Provider' => $user->getProvider(), 'valide' => null, 'supprime' => null]);
        } else {
            $planing = $this->planingRepository->findBy(['user' => $user->getId(), 'supprime' => null]);
        }
        $plannings= array();
       foreach($planing as $p){
           $time = $this->calculeFromTo($p->getPlannedStart(), $p->getPlannedEnd());
           array_push($plannings, [$p, 'start' => $time[0][0], 'end' => $time[0][1]]);

       }

        return $this->render('cleaner/index.html.twig', [
            'plannings' => $plannings
        ]);
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


    /**
     * @Route("/detail/{id}", name="detail")
     */
    public function detail(int $id)
    {
        return $this->render('cleaner/detail.html.twig', [
            'planing' => $this->plannedCleaningRepository->findOneBy([
                'id' => $id
            ]),
            'workers' => $this->planingRepository->findBy(['PlannedCleaning' => $id])
        ]);
    }

    /**
     * @Route("/detail/{id}/edit", name="edit")
     */
    public function edit(int $id, Request $request)
    {

        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $cleaning = $this->plannedCleaningRepository->findOneBy(['id' => $id]);

        $form = $this->createForm(HorraireType::class, $cleaning);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $start = ($form["from"]->getData()->format('i')) + ($form["from"]->getData()->format('H') * 60);
            $end = ($form["to"]->getData()->format('i')) + ($form["to"]->getData()->format('H') * 60);

            $cleaning->setPlannedStart($start);
            $cleaning->setPlannedEnd($end);
            $cleaning->setEdited(1);

            $em->flush();
            $this->addFlash('success', 'The date has been successfully edited');
            return $this->redirectToRoute('cleaner_detail', array('id' => $id));
        }

        return $this->render('cleaner/edit.html.twig', [
            'id' => $id,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/detail/{id}/add", name="add")
     * @Security("has_role('ROLE_WORKER_ADMIN')")
     */
    public function add(int $id, Request $request)
    {
        $user =  $this->getUser();
        $planing = $this->plannedCleaningRepository->findOneBy(['id' => $id]);

        $task = new Planing();

        $form = $this->createFormBuilder($task)
            ->add('user', EntityType::class, [
                'class' => MooveeUsers::class,
                'label' => 'Worker',
                'choices' => $this->mooveeUsersRepository->findUserByProvider($planing->getProvider()),
                'choice_label' => function (MooveeUsers $user) {
                    return $user->getFirstname() . ' ' . $user->getLastName();
                },
            ])

            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();

            $task->setPlannedCleaning($planing);
            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();
            return $this->redirectToRoute('cleaner_detail', array('id' => $id));
        }

        return $this->render('cleaner/add.html.twig', [
            'form' => $form->createView(),
            'id' => $id,

        ]);
    }

    /**
     * @Route("/detail/{id}/delete", name="delete_order")
     */
    public function deleteorder(int $id)
    {
        $this->addFlash('success', 'The order has been successfully deleted!');
        $em = $this->getDoctrine()->getManager();

        $delorder = $em->getRepository(PlannedCleaning::class)->find($id);

        $providers = $this->mooveeUsersRepository->findAdminWorkerByProvider($delorder->getProvider());

        try {
            if ($providers != null) {
                foreach ($providers as $provider) {
                    $googleToken = $provider->getGoogleToken();
                    if ($googleToken != null) {
                        $googleCalendar = new CalendarGoogle();
                        $client = $googleCalendar->getClient();
                        $client->setAccessToken($googleToken);
                        $googleCalendar->delete($client, $delorder->getId());
                    }
                }
            }
            $user = $this->getUser();
            $googleToken = $user->getGoogleToken();
            if ($googleToken != null) {

                $googleCalendar = new CalendarGoogle();
                $client = $googleCalendar->getClient();
                $client->setAccessToken($googleToken);
                $googleCalendar->delete($client, $delorder->getId());
            }
        } catch (\Exception $e) {
            $this->addFlash('success', 'The order has been successfully deleted! But we couldn\'nt delete a event from your calendar');
        }

        $planings = $delorder->getPlanings();

        foreach ($planings as $planing) {

            $em->remove($planing);
        }

        $delorder->setSupprime(1);

        $em->flush();

        return $this->redirectToRoute('cleaner_calendar');
    }


    /**
     * @Route("/detail/{id}/delete/{iduser}", name="delete")
     * @Security("has_role('ROLE_WORKER_ADMIN')")
     */
    public function delete(int $id, int $iduser)
    {

        $em = $this->getDoctrine()->getManager();
        $planing = $em->getRepository(Planing::class)->findOneBy(['PlannedCleaning' => $id, 'user' => $iduser]);

        $em->remove($planing);
        $em->flush();
        return $this->redirectToRoute('cleaner_detail', array('id' => $id));
    }
}
