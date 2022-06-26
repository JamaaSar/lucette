<?php

namespace App\Controller;

use App\Repository\MooveeCarRepository;
use App\Repository\MooveeCompanyRepository;
use App\Repository\MooveeUserHasCarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/usercar", name="usercar_")
 * @Security("has_role('ROLE_ADMIN')")
 */
class UserCarController extends AbstractController
{

    private $mooveeCarRepository;
    private $mooveeUserHasCarRepository;
    private $mooveeCompanyRepository;

    public function __construct(MooveeCompanyRepository $mooveeCompanyRepository,MooveeCarRepository $mooveeCarRepository, MooveeUserHasCarRepository $mooveeUserHasCarRepository)
    {
        $this->mooveeCarRepository = $mooveeCarRepository;
        $this->mooveeUserHasCarRepository = $mooveeUserHasCarRepository;
        $this->mooveeCompanyRepository = $mooveeCompanyRepository;

    }

    /**
     * @Route("/", name="list")
     */
    public function index()
    {

        return $this->render('user_car/index.html.twig', [
            'cars' => $this->mooveeUserHasCarRepository->findby(['is_deleted' => null]),
        ]);
    }
}
