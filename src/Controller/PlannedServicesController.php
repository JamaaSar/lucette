<?php

namespace App\Controller;

use App\Repository\MooveeCompanyRepository;
use App\Repository\PlannedCleaningRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/services", name="planned_services_")
 */
class PlannedServicesController extends AbstractController
{



    private $plannedCleaningRepository;
    private $mooveeCompanyRepository;

    public function __construct(MooveeCompanyRepository $mooveeCompanyRepository,PlannedCleaningRepository $plannedCleaningRepository)
    {
        $this->plannedCleaningRepository = $plannedCleaningRepository;
        $this->mooveeCompanyRepository = $mooveeCompanyRepository;
    }


    /**
     * @Route("", name="list")
     */
    public function index()
    {
        $user = $this->getUser();
      
        return $this->render('planned_services/index.html.twig', [
            'planned_cleanings' => $this->plannedCleaningRepository->findBy(['userid' => $user,'valide' => null, 'supprime'=>null],['date' => 'ASC']),
            'avalider' => $this->plannedCleaningRepository->findBy(['userid' => $user, 'valide' => 1, 'edited' => 1, 'supprime'=>null, 'captured'=>1],['date' => 'ASC']),
            'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $this->getUser()->getCodeCompany()]),
            'planned_cleaningsAttend' => $this->plannedCleaningRepository->findBy(['userid' => $user, 'valide' => 1, 'captured' => 0, 'supprime' => null], ['date' => 'ASC'])
             
        ]);
    }
   
    
}
