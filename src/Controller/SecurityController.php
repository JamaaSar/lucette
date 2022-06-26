<?php

namespace App\Controller;

use App\Form\ForgetPassType;
use App\Form\SignUpType;
use App\Entity\MooveeUsers;
use App\Mail\ReponseMail;
use App\Repository\MooveeUsersRepository;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Response;


class SecurityController extends AbstractController
{


    private $mooveeUsersRepository;

    public function __construct(MooveeUsersRepository $mooveeUsersRepository)
    {

        $this->mooveeUsersRepository = $mooveeUsersRepository;
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }


    /**
     * @Route("/sign-up", name="signup")
     */
    public function signup(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {

        $client = new MooveeUsers();
        $form = $this->createForm(SignUpType::class, $client);
        $form->handleRequest($request);

        $googletok = NULL;
        if ($form->isSubmitted() && $form->isValid()) {


            $user = $this->mooveeUsersRepository->findBy(['username' => $client->getEmail()]);
            if ($user != null) {
                $this->addFlash('danger', 'This email address is already taken');
                return $this->redirectToRoute('signup');
            } else {


                $token = $this->genererChaineAleatoire(15);

                $password = $passwordEncoder->encodePassword($client, $client->getPlainPassword());
                $client->setPassword($password);
                $client->setCreatedDate(new \DateTime('now'));
                $client->setSalt('');
                $client->setRoles(array('ROLE_USER'));
                $client->setUsername($client->getEmail());
                $client->setVerifyToken($token);
                $em = $this->getDoctrine()->getManager();



                $em->persist($client);

                $em->flush();

                $mail = new ReponseMail();
                $mail->sendMailSignUp($client, $token);
                $this->addFlash('success', 'Your account has been successfully created. Please validate your account by clicking on the link you received by email !');
                return $this->redirectToRoute('login');
            }
        }

        return $this->render('security/signup.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/forgotpassword", name="forgotpassword")
     */
    public function forgotpass(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {

        $client = new MooveeUsers();
        $form = $this->createForm(ForgetPassType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $newClient = $this->mooveeUsersRepository->findOneBy(['username' => $client->getEmail()]);

            //$password = "ok";

            if ($newClient == null) {
                $this->addFlash('danger', 'The email address entered is incorrect !');
                return $this->redirectToRoute('forgotpassword');
            } else {

                $newpassword = $this->genererChaineAleatoire(10);
                $password = $passwordEncoder->encodePassword($newClient, $newpassword);
                $newClient->setPassword($password);
                $mail = new ReponseMail();
                $mail->sendMailForgetPass($client, $newpassword);
                $em->persist($newClient);
                $em->flush();

                $this->addFlash('success', 'Your new password has been sent. Check your mail Box!');
                return $this->redirectToRoute('login');
            }
        }
        return $this->render('security/forgetpassword.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/confirmation/{token}", name="confirmation")
     */
    public function confirme(string $token)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository(MooveeUsers::class)->findOneBy(['verifyToken' => $token]);

        if ($user == null) {
            return $this->redirectToRoute('login');
        }

        $user->setVerifyToken(Null);

        $em->persist($user);

        $em->flush();

        return $this->render('security/confirme.html.twig', [
            'user' => $user
        ]);
    }

    function genererChaineAleatoire($longueur, $listeCar = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $chaine = '';
        $max = mb_strlen($listeCar, '8bit') - 1;
        for ($i = 0; $i < $longueur; ++$i) {
            $chaine .= $listeCar[random_int(0, $max)];
        }
        return $chaine;
    }
}
