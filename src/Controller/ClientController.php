<?php

namespace App\Controller;


use App\Repository\MooveeUsersRepository;
use App\Entity\MooveeUsers;
use App\Form\ClientType;
use App\Form\AdminPassType;
use App\Mail\ReponseMail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


/**
 * @Route("/client", name="client_")
 * @Security("has_role('ROLE_ADMIN')")
 */
class ClientController extends AbstractController
{
    private  $mooveeUsersRepository;

    public function __construct(MooveeUsersRepository $mooveeUsersRepository)
    {
        $this->mooveeUsersRepository = $mooveeUsersRepository;
    }

    /**
     * @Route("", name="list")
     */
    public function index()
    {
        return $this->render('client/list.html.twig', [
            'clients' => $this->mooveeUsersRepository->findBy(['is_deleted' => Null])
        ]);
    }


    /**
     * @Route("/sanscode", name="sanscode")
     */
    public function clientSansCode()
    {

        return $this->render('client/sanscode.html.twig', [
            'clients' => $this->mooveeUsersRepository->getClientsWithoutCode()
            // 'clients' => $this->mooveeUsersRepository->validerToken()
        ]);
    }
    /**
     * @Route("/tokenmissing", name="tokenmissing")
     */
    public function tokenMissing()
    {
        return $this->render('client/sanscode.html.twig', [
            'clients' => $this->mooveeUsersRepository->findUsersMissingToken()
        ]);
    }
    /**
     * @Route("/modifier/{id}/validertok", name="validertok")
     */
    public function validerToken(int $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->mooveeUsersRepository->findOneBy(['id' => $id]);
        $user->setVerifyToken(Null);
        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('client_sanscode');
    }
    /**
     * @Route("/modifier/{id}/adminpasschange", name="adminpasschange")
     */
    public function adminpasschange(int $id, UserPasswordEncoderInterface $passwordEncoder, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->mooveeUsersRepository->findOneBy(['id' => $id]);
        $form = $this->createForm(AdminPassType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //echo('<script>alert("Form '. $client->getPassword() .' Bd '. $curpass .'")</script>');
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);

            $em->persist($user);

            $em->flush();
            return $this->redirectToRoute('client_modifier', ['id' => $id]);
        }
        return $this->render('security/adminpasschange.html.twig', [
            'form' => $form->createView(),
            'user' => $user
        ]);
    }


    /**
     * @Route("/modifier/{id}", name="modifier", requirements={"id" = "\d+"})
     */
    public function modifier(Request $request, int $id, UserPasswordEncoderInterface $passwordEncoder)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository(MooveeUsers::class)->find($id);
        $form = $this->createForm(ClientType::class, $client);
        $role = $client->getRoles();
        $form->get("role")->setData(implode("", $role));

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('success', 'Ce client a bien été modifié!');

            $client->setRoles(array($form["role"]->getData()));


            $client->setUsername($client->getEmail());


            $em->persist($client);

            $em->flush();
            return $this->redirectToRoute('client_list');
        }

        return $this->render('client/modifier.html.twig', [
            'form' => $form->createView(),
            'client' => $client,
        ]);
    }



    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function supprimer(int $id)
    {

        $em = $this->getDoctrine()->getManager();

        $client = $em->getRepository(MooveeUsers::class)->find($id);
        $client->setUsername($client->getFirstName() . " " . $client->getLastName());
        $client->setIsDeleted("1");
        $em->persist($client);
        $em->flush();

        return $this->redirectToRoute('client_list');
    }
}
