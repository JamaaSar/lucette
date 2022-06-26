<?php

namespace App\Controller;

use App\Entity\MooveeCompany;
use App\Form\CompanyType;
use App\Repository\MooveeCompanyRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use App\Mail\ReponseMail;


/**
 * @Route("/", name="company_")
 * @Security("has_role('ROLE_ADMIN')")
 */
class CompanyController extends AbstractController
{

    private  $mooveeCompanyRepository;

    public function __construct(MooveeCompanyRepository $mooveeCompanyRepository)
    {
        $this->mooveeCompanyRepository = $mooveeCompanyRepository;
    }


    /**
     * @Route("company", name="list")
     */
    public function index()
    {
        return $this->render('company/list.html.twig',[
            'company' => $this->mooveeCompanyRepository->findAll()
        ]);
    }

    /**
     * @Route("/add", name="add")
     */
    public function add(Request $request)
    {
        $newcompany = (new MooveeCompany())
            ->setCreatedDate(new \DateTime('now'));



        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(CompanyType::class,$newcompany);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()){
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $form->get('image')->getData();

            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            try {
                $file->move(
                    $this->getParameter('logo_directory'),
                    $fileName
                );
            } catch (FileException $e) {
                $this->addFlash('success', 'ERROR');
                return $this->redirectToRoute('company_list');
            }

           

            $newcompany->setPhoto($fileName);

            $em->persist($newcompany);
            $em->flush();
            $message = new ReponseMail();
            // dd($form->get('codeEntreprise')->getData());
            $nameL = $form->get('codeEntreprise')->getData();
            $message->createListContact($nameL);

            $this->addFlash('success', 'The company has been successfully added!');
            return $this->redirectToRoute('company_list');
        }

        return $this->render('company/add.html.twig',[
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit(int $id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $currentcompany = $this->mooveeCompanyRepository->findOneBy(['id' => $id]);
        $img = $currentcompany->getPhoto();
        $currentcompany->setPhoto(new File($this->getParameter('logo_directory').'/'.$img));
        //echo("<script>alert('".$img."')</script>");


        $form = $this->createForm(CompanyType::class,$currentcompany);



        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()){

            if($form->get('image')->getData() !== null) {


                /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
                $file = $form->get('image')->getData();


                $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();

                    try {
                        $file->move(
                            $this->getParameter('logo_directory'),
                            $fileName
                        );
                    }
                    catch (FileException $e) {
                        $this->addFlash('success', 'ERROR');
                        return $this->redirectToRoute('company_list');
                    }
                $currentcompany->setPhoto($fileName);
                }
            else{
                $currentcompany->setPhoto($img);
                //echo("<script>alert'".$img."'</script>");
            }

            $currentcompany->setUpdatedDate(new \DateTime('now'));


            $this->addFlash('success', 'The company has been successfully edited!');

            //$em->persist($currentcompany);
            $em->flush();


            return $this->redirectToRoute('company_list');
        }

        return $this->render('company/edit.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
}