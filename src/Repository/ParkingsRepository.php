<?php

namespace App\Repository;

use App\Entity\Parkings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Parkings|null find($id, $lockMode = null, $lockVersion = null)
 * @method Parkings|null findOneBy(array $criteria, array $orderBy = null)
 * @method Parkings[]    findAll()
 * @method Parkings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParkingsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Parkings::class);
    }


    public function findParkingsByCatProvider($provider){
        return $this->createQueryBuilder('p')
            ->leftJoin('p.parkingCat', 'c')
            ->leftJoin('c.id_category', 'cat' )
            ->leftJoin('cat.cats', 'ct')
            ->where('p.id = c.id_location')
            ->andWhere('ct.id_provider = :provider')
            ->andWhere('p.is_deleted = 0')
            ->setParameter('provider', $provider)
            ->getQuery()
            ->getResult();
    }
    

    // /**
    //  * @return Parkings[] Returns an array of Parkings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Parkings
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
