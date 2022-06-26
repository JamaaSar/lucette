<?php

namespace App\Repository;

use App\Entity\MooveeCar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MooveeCar|null find($id, $lockMode = null, $lockVersion = null)
 * @method MooveeCar|null findOneBy(array $criteria, array $orderBy = null)
 * @method MooveeCar[]    findAll()
 * @method MooveeCar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MooveeCarRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MooveeCar::class);
    }

    public function getDistinctBrand()
    {
        $qb = $this->createQueryBuilder('i');
        $qb->select('DISTINCT i.brand_car')
            ->orderBy('i.brand_car', 'ASC');
        return $qb;
    }

    public function findCarByIdUserHasCar($value){
        return $this->createQueryBuilder('a')
            ->leftJoin('a.mooveeUserHasCars', 'u')
            ->andWhere('u.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
            ;
    }
 
    // /**
    //  * @return MooveeCar[] Returns an array of MooveeCar objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MooveeCar
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
