<?php

namespace App\Controller;
require __DIR__.'/../../vendor/autoload.php';

use App\Entity\CreditCard;
use App\Form\PassType;
use App\Form\UserType;
use App\Repository\CreditCardRepository;
use App\Repository\MooveeCompanyRepository;
use App\Repository\PlannedCleaningRepository;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


/**
 * @Route("/", name="user_")
 */
class UserController extends AbstractController
{

    /**
     * @var \Swift_Mailer
     */
    private $mailer;
    private $plannedCleaningRepository;
    private $creditCardRepository;
    private $mooveeCompanyRepository;


    public function __construct(MooveeCompanyRepository $mooveeCompanyRepository, PlannedCleaningRepository $plannedCleaningRepository, CreditCardRepository $creditCardRepository, UserPasswordEncoderInterface $passwordEncoder, \Swift_Mailer $mailer)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->mailer = $mailer;
        $this->creditCardRepository = $creditCardRepository;
        $this->plannedCleaningRepository = $plannedCleaningRepository;
        $this->mooveeCompanyRepository = $mooveeCompanyRepository;
    }



    /**
     * @Route("profile", name="profile")
     */
    public function index()
    {
        $user = $this->getUser();
        return $this->render('user/profile.html.twig', [
            'creditCards' => $this->creditCardRepository->findBy(['customerId' => $user]),
            'Orders' => $this->plannedCleaningRepository->findBy(['userid' => $user, 'valide' => null]),
            'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
        ]);
    }



    /**
     * @Route("profile/edit", name="edit")
     */
    public function modifier(Request $request)
    {

        $user = $this->getUser();


        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('success', 'Your profile has been successfully changed!');
            $email = strtolower($user->getEmail());

            $user->setUpdatedDate(new \DateTime('now'));
            $user->setEmail($email);
            $user->setUsername($email);

            $em->persist($user);

            $em->flush();


            return $this->redirectToRoute('user_profile');
        }

        return $this->render('user/edit.html.twig', [
            'form' => $form->createView(),
            'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
        ]);
    }


    /**
     * @Route("profile/editpassword", name="editpassword")
     */
    public function pass(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {

        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();


        //$client = $em->getRepository(MooveeUsers::class)->find($user->getId());
        $form = $this->createForm(PassType::class, $user);


        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            //echo('<script>alert("Form '. $client->getPassword() .' Bd '. $curpass .'")</script>');


            $oldPassword = $user->getOldPassword();
            //echo('<script>alert("'. $oldPassword .'")</script>');

            if ($passwordEncoder->isPasswordValid($user, $oldPassword)) {
                $this->addFlash('success', 'Your password as been successfully changed !');
                //echo('<script>alert("Form '. $user->getPlainPassword() .' Bd '. $oldPassword .' OK")</script>');
                $newEncodedPassword = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
                $user->setPassword($newEncodedPassword);


                $em->persist($user);

                $em->flush();


                return $this->redirectToRoute('user_profile');
            } else {
                $this->addFlash('danger', 'Current Password invalid !');
                //echo('<script>alert("Form '. $user->getPlainPassword() .' Bd '. $oldPassword .'")</script>');
                return $this->redirectToRoute('user_editpassword');
            }
        }


        return $this->render('user/editpassword.html.twig', [
            'form' => $form->createView(),
            'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $user->getCodeCompany()]),
        ]);
    }


    /**
     * @Route("profile/addCard", name="addCard")
     */
    public function addcard(Request $request)
    {

        if ($request->getMethod() == 'POST') {

            \Stripe\Stripe::setApiKey($this->getParameter('private_key_stripe'));
            $user = $this->getUser();
            $card = new CreditCard();
            $em = $this->getDoctrine()->getManager();
            $this->addFlash('success', 'Your card has been successfully added!');
            $token = $_POST['stripeToken'];

            if ($user->getCustomertoken() == Null) {
                // Create a Customer:
                $customer = \Stripe\Customer::create([
                    'email' => $user->getEmail(),
                ]);

                $user->setCustomertoken($customer->id);
                $em->persist($user);

                $em->flush();
            }

            $user = $this->getUser();

            $newcard = \Stripe\Customer::createSource(
                $user->getCustomerToken(),
                [

                    'source' => $token,
                ]
            );

            $card->setCustomerId($user);
            $card->setCardType($newcard->brand);
            $card->setCardToken($newcard->id);
            $card->setLastDigits($newcard->last4);
            $card->setMonthValidity($newcard->exp_month);
            $card->setYearValidity($newcard->exp_year);

            $em->persist($card);

            $em->flush();


            return $this->redirectToRoute('user_profile');
        }

        return $this->render('user/addcard.html.twig', [
            'custom_layout' => $this->mooveeCompanyRepository->findOneBy(['code_entreprise' => $this->getUser()->getCodeCompany()]),
        ]);
    }

    /**
     * @Route("profile/delCard/{id}", name="deleteCard")
     */
    public function deleteCard(Request $request, int $id)
    {

        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();

        $card = $this->creditCardRepository->findOneBy(['id' => $id]);

        $em->remove($card);

        $em->flush();

        return $this->redirectToRoute('user_profile');
    }
    /**
     * @Route("profile/subscribe", name="subscribe")
     */
    public function subscribe(){
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();

        $user->getSubscribe(true);
        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('user_profile');

    }
    /**
     * @Route("profile/unsubscribe", name="unsubscribe")
     */
    public function unsubscribe()
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();

        $user->getSubscribe(false);
        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('user_profile');
    }




    /**
     * @Route("profile/pdf/{id}", name="pdf")
     */
    public function pdf(Request $request, int $id)
    {
        $user = $this->getUser();
        $planned_cleaning = $this->plannedCleaningRepository->findOneBy(['id' => $id, 'userid' => $user]);
        if ($planned_cleaning == null) {
            return $this->redirectToRoute("user_profile");
        }

        //on selectionne la vue devant servir de template au pdf
        $template = $this->renderView('pdf/facture.html.twig', [
            'user' => $user,
            'planned_cleaning' => $planned_cleaning,
        ]);

        // création du pdf selon les standards

        $pdf = new Html2Pdf('P', 'A4', 'fr', 'true', 'UTF-8');
        $pdf->writeHTML($template);
        //affichage du pdf
        $pdf->Output('facture.pdf');

        //return null;
    }
}
