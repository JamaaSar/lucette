<?php

namespace App\Repository;

use App\Entity\PhotosParking;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PhotosParking|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhotosParking|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhotosParking[]    findAll()
 * @method PhotosParking[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotosParkingRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PhotosParking::class);
    }

    // /**
    //  * @return PhotosParking[] Returns an array of PhotosParking objects
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
    public function findOneBySomeField($value): ?PhotosParking
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
