<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MooveeCompanyRepository;

class BioOrdersController extends AbstractController
{

    public function __construct(
        MooveeCompanyRepository $mooveeCompanyRepository
    ) {
        $this->mooveeCompanyRepository = $mooveeCompanyRepository;
    }


    /**
     * @Route("/bio_orders", name="bioOrders")
     */
    public function index()
    {


        //<a href="{{ path("iframe") }}"> <i class="menu-icon ti-support"></i>Iframe </a>
        return $this->render('bio_orders/index.html.twig', [
            'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $this->getUser()->getCodeCompany()]),
        ]);
    }
}
