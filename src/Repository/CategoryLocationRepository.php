<?php

namespace App\Repository;

use App\Entity\CategoryLocation;

use App\Entity\Parkings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CategoryLocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryLocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryLocation[]    findAll()
 * @method CategoryLocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryLocationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CategoryLocation::class);
    }

    public function categoryByLocation(Parkings $park)
    {
        return $this
            ->createQueryBuilder('p')
            ->where('p.id_location = :park')
            ->setParameter('park', $park)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return CategoryLocation[] Returns an array of CategoryLocation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategoryLocation
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
