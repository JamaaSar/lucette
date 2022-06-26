<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CheckCarsController extends AbstractController
{
    /**
     * @Route("/check_cars", name="checkCars")
     */
    public function index()
    {
        //<a href="{{ path("iframe") }}"> <i class="menu-icon ti-support"></i>Iframe </a>
        return $this->render('check_cars/index.html.twig');
    }
}
