<?php

namespace App\Repository;

use App\Entity\PlannedCleaningOptions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PlannedCleaningOptions|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlannedCleaningOptions|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlannedCleaningOptions[]    findAll()
 * @method PlannedCleaningOptions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlannedCleaningOptionsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PlannedCleaningOptions::class);
    }


    // /**
    //  * @return PlannedCleaningOptions[] Returns an array of PlannedCleaningOptions objects
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
    public function findOneBySomeField($value): ?PlannedCleaningOptions
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
