<?php

namespace App\Controller;

use App\Form\SupportType;
use App\Repository\MooveeUsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Mail\ReponseMail;

/**
 * @Route("/support", name="support_")
 */
class SupportController extends AbstractController
{

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    private $mooveeUsersRepository;

    public function __construct(\Swift_Mailer $mailer, MooveeUsersRepository $mooveeUsersRepository)
    {
        $this->mailer = $mailer;
        $this->mooveeUsersRepository = $mooveeUsersRepository;

    }

    /**
     * @Route("/", name="form")
     */
    public function index(Request $request)
    {

        $user = $this->getUser();

        $form = $this->createForm(SupportType::class,$user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /*$message = (new \Swift_Message('Support Asking: ' . $user->getEmail()))
                ->setFrom('noreply@moovee.lu')
                ->setTo('support@moovee.lu')
                ->setBody(
                    $this->renderView('email/support.html.twig', ['user' => $user, 'message' => $form["Message"]->getData(), 'service' => $form["service"]->getData(), 'object' => $form["object"]->getData()]),
                    'text/html'
                );

            $this->mailer->send($message);*/

            $message = new ReponseMail();
            $message->sendMailSupport( 
                $user->getFirstname(), 
                $user->getLastName(), 
                $user->getEmail(),
                $user->getPhoneNumber(), 
                $form["Message"]->getData(),
                $form["service"]->getData(),
                $form["object"]->getData() );
            

            $this->addFlash('success', 'Your request has been successfully taken by our support!');
            return $this->render('support/response.html.twig', [
            ]);
        }
        

        return $this->render('support/index.html.twig', [
            'controller_name' => 'SupportController',
            'form' => $form->createView()
        ]);
    }
}
