<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class KlinLaundryController extends AbstractController
{
    /**
     * @Route("/klin", name="klinLaundry")
     */
    public function index()
    {
        //<a href="{{ path("iframe") }}"> <i class="menu-icon ti-support"></i>Iframe </a>
        return $this->render('klin/index.html.twig');
    }
}
