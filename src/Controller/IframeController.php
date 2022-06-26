<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IframeController extends AbstractController
{
    
  

    /**
     * @Route("/iframe", name="iframe")
     */
    public function index()
    {
        //<a href="{{ path("iframe") }}"> <i class="menu-icon ti-support"></i>Iframe </a>
        return $this->render('check_cars/index.html.twig');
    }
}
