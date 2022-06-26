<?php

namespace App\Repository;

use App\Entity\MooveeUserHasCar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MooveeUserHasCar|null find($id, $lockMode = null, $lockVersion = null)
 * @method MooveeUserHasCar|null findOneBy(array $criteria, array $orderBy = null)
 * @method MooveeUserHasCar[]    findAll()
 * @method MooveeUserHasCar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MooveeUserHasCarRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MooveeUserHasCar::class);
    }


    public function FindUserHasCarByUser($user)
    {
        return $this->createQueryBuilder('u')
            ->where('u.user_has_car_id_user = :user')
            ->andWhere('u.is_deleted is NULL')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult()
            ;
    }
    public function FindUserHasCarByDefault($user)
    {
        return $this->createQueryBuilder('u')
            ->where('u.id = 9')
            ->getQuery()
            ->getResult()
            ;
    }
    public function FindUserHasCarBycarr($car)
    {
        return $this->createQueryBuilder('u')
            ->leftJoin('u.user_has_car_id_car', 'c')
            ->where('c.id = :car')
            ->andWhere('u.is_deleted is NULL')
            ->setParameter('car', $car)
            ->getQuery()
            ->getResult();
    }
   
    // /**
    //  * @return MooveeUserHasCar[] Returns an array of MooveeUserHasCar objects
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
    public function findOneBySomeField($value): ?MooveeUserHasCar
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
