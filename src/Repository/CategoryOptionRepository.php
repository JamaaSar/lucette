<?php

namespace App\Repository;

use App\Entity\CategoryOption;
use App\Entity\Products;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CategoryOption|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryOption|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryOption[]    findAll()
 * @method CategoryOption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryOptionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CategoryOption::class);
    }


    public function FindOptionByProductAndCategory(string $prod ,string $cat){
        return $this->createQueryBuilder('a')
            ->leftJoin('a.id_option', 'o')
            ->andWhere('a.category = :cat')
            ->andWhere('o.id_product = :prod')
            ->andWhere('o.supprime is NULL')
            ->setParameter('cat', $cat)
            ->setParameter('prod', $prod)
            ->orderBy('o.name', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }
    public function findProductsByCatAndOption($provider)
    {
        return $this->createQueryBuilder('a')
            ->addSelect('p')
            ->leftJoin('a.id_option', 'p')
            ->leftJoin('p.id_product', 'c')
            ->leftJoin('c.id_provider', 's')
            ->andwhere('a.id = a.id')
            ->andwhere('a.id_option = p.id')
            ->andwhere('c.id_provider = :provider')
            ->andwhere('p.supprime is NULL')
            ->andwhere('c.supprime is NULL')
            ->setParameter('provider', $provider)
            ->getQuery()
            ->getResult();
    }
    public function FindOptionByProduct(string $prod)
    {
        return $this->createQueryBuilder('a')
            ->leftJoin('a.id_option', 'o')
            ->andWhere('o.id_product = :prod')
            ->andWhere('o.supprime is NULL')
            ->setParameter('prod', $prod)
            ->orderBy('o.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return CategoryOption[] Returns an array of CategoryOption objects
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
    public function findOneBySomeField($value): ?CategoryOption
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
