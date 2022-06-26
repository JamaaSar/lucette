<?php

namespace App\Repository;

use App\Entity\Products;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Products|null find($id, $lockMode = null, $lockVersion = null)
 * @method Products|null findOneBy(array $criteria, array $orderBy = null)
 * @method Products[]    findAll()
 * @method Products[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Products::class);
    }
   
   /**
    * updat commission
    */
    public function commision()
    {
        return $this->createQueryBuilder('')
            ->update('Products', 'p')
            ->set('p.commission', 'p.commission/100')
            ->getQuery()
            ->execute();
    }
    public function findProductsByProvider($provider)
    {
        return $this->createQueryBuilder('u')
            ->where('u.id_provider = :provider')
            ->andwhere('u.supprime is NULL')
            //->orderBy('u.category_service_id', 'ASC')
            ->setParameter('provider', $provider)
            ->getQuery()
            ->getResult();
    }
    public function findProductsByCatAndOption($provider)
    {
        return $this->createQueryBuilder('p')
            ->addSelect('o')
            ->leftJoin('p.option', 'o')
            ->leftJoin('o.category_option', 'c')
            ->leftJoin('p.categoryProducts', 'cp')
            ->andwhere('p.id_provider = :provider')
            ->andWhere('o.supprime is NULL')
            ->andWhere('p.supprime is NULL')
            ->setParameter('provider', $provider)
            ->getQuery()
            ->getResult();
    }
    public function findAllDirectBuy()
    {
        return $this->createQueryBuilder('p')
            ->andwhere('p.direct_buy = 1')
            ->andWhere('p.supprime is NULL')
            ->getQuery()
            ->getResult();
    }
    public function findAllIndirectBuy()
    {
        return $this->createQueryBuilder('p')
            ->andwhere('p.direct_buy = 0')
            ->andWhere('p.supprime is NULL')
            ->getQuery()
            ->getResult();
    }
  
    
    


    // /**
    //  * @return Products[] Returns an array of Products objects
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
    public function findOneBySomeField($value): ?Products
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
