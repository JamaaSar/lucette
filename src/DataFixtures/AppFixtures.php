<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\MooveeUsers;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{


    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
         $this->passwordEncoder = $passwordEncoder;
     }

    /**
     * @var ObjectManager
     */
    private $manager;


    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $this->manager = $manager;
        $this->loadUser();
    }


    private function loadUser()
    {
        for ($i = 1; $i < 15; $i++){


                $client = (new MooveeUsers())
                    ->setFirstName('Prenom ' . $i)
                    ->setLastName('Nom ' . $i)
                    ->setCreatedDate(\DateTime::createFromFormat("d/m/Y H:i", "25/04/2015 15:00"))
                    ->setCodeCompany("code")
                    ->setEmail("user" . $i . "@gmail.com")
                    ->setNumberAndStreet('adresse client' . $i )
                    ->setPhoneNumber("06 "   .random_int(0,9).random_int(0,9)." "
                                                        .random_int(0,9).random_int(0,9)." "
                                                        .random_int(0,9).random_int(0,9)." "
                                                        .random_int(0,9).random_int(0,9) )
                    ->setZipCode(random_int(0,9).random_int(0,9).random_int(0,9).random_int(0,9).random_int(0,9))
                    ->setUsername("user" . $i . "@gmail.com")

                    ->setSalt('')
                    ->setRoles(array('ROLE_USER'))
                    ->setCity("City");

            $password = $this->passwordEncoder->encodePassword($client,'user'.$i);
            $client->setPassword($password);




            $this->manager->persist($client);
        }

        for ($i = 1; $i < 3; $i++){



            $client = (new MooveeUsers())
                ->setFirstName('Prenom ' . $i)
                ->setLastName('Nom ' . $i)
                ->setCreatedDate(\DateTime::createFromFormat("d/m/Y H:i", "25/04/2015 15:00"))
                ->setCodeCompany("code")
                ->setEmail("admin" . $i . "@gmail.com")
                ->setNumberAndStreet('adresse admin' . $i )
                ->setPhoneNumber("06 "   .random_int(0,9).random_int(0,9)." "
                    .random_int(0,9).random_int(0,9)." "
                    .random_int(0,9).random_int(0,9)." "
                    .random_int(0,9).random_int(0,9) )
                ->setZipCode(random_int(0,9).random_int(0,9).random_int(0,9).random_int(0,9).random_int(0,9))
                ->setUsername("admin" . $i . "@gmail.com")

                ->setSalt('')
                ->setRoles(array('ROLE_ADMIN'))
                ->setCity("City");

            $password = $this->passwordEncoder->encodePassword($client,'admin'.$i);
            $client->setPassword($password);




            $this->manager->persist($client);
        }

        $this->manager->flush();
    }
}
