<?php

namespace App\Controller;

use App\Entity\Reduction;
use App\Form\ReductionType;
use App\Repository\ReductionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/reduction", name="reduction_")
 * @Security("has_role('ROLE_ADMIN')")
 */
class ReductionController extends AbstractController
{

    private  $reductionRepository;

    public function __construct(ReductionRepository $reductionRepository)
    {
        $this->reductionRepository = $reductionRepository;
    }


    /**
     * @Route("", name="list")
     */
    public function index()
    {
        return $this->render('reduction/index.html.twig', [
            'reductions' => $this->reductionRepository->findBy(['utilise' => null]),
        ]);
    }


    /**
     * @Route("/add", name="add")
     */
    public function add(Request $request)
    {
        $reduction = (new Reduction());




        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(ReductionType::class,$reduction);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()){



            $em->persist($reduction);
            $em->flush();
            $this->addFlash('success', 'The reduction has been successfully added!');
            return $this->redirectToRoute('reduction_list');
        }

        return $this->render('reduction/add.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/modifier/{id}", name="modifier", requirements={"id" = "\d+"})
     */
    public function modifier(Request $request, int $id)
    {
        $em = $this->getDoctrine()->getManager();
        $reduction = $em->getRepository(Reduction::class)->find($id);
        $form = $this->createForm(ReductionType::class,$reduction);


        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()){
            $this->addFlash('success', 'Cette réduction a bien été modifiée!');


            $em->persist($reduction);

            $em->flush();


            return $this->redirectToRoute('reduction_list');
        }

        return $this->render('reduction/modifier.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function supprimer(int $id)
    {

        $em = $this->getDoctrine()->getManager();

        $reduction = $this->reductionRepository->findOneBy(['id' => $id]);

        $em->remove($reduction);

        $em->flush();
        return $this->redirectToRoute('reduction_list');
    }
}
