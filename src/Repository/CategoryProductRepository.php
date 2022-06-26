<?php

namespace App\Repository;

use App\Entity\CategoryProduct;
use App\Entity\Provider;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CategoryProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryProduct[]    findAll()
 * @method CategoryProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryProductRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CategoryProduct::class);
    }


    public function FindProductByProvider(Provider $provider)
    {
        return $this->createQueryBuilder('a')
            ->leftJoin('a.id_product', 'p')
            ->andWhere('p.supprime is NULL')
            ->andWhere('p.id_provider = :provider')
            ->setParameter('provider', $provider)
            ->getQuery()
            ->getResult();
    }

    /**
     * Find category product by car category used in CarServicesController
     */
    public function FindProductByProviderCarCategory($provider, $carcat)
    {
        return $this->createQueryBuilder('a')
            ->addSelect('p')
            ->leftJoin('a.id_product', 'p')
            ->andWhere('a.category = :carcat')
            ->andWhere('p.supprime is NULL')
            ->andWhere('p.id_provider = :provider')
            ->setParameter('provider', $provider)
            ->setParameter('carcat', $carcat)
            ->getQuery()
            ->getResult();
    }

    /**
     * Used in order for finding a product by category of service and provider in
     * function serviceproduct(CarServicesController)
     * and product(WellnessController)
     */
    public function FindProductByCat( $category,  $provider)
    {
        return $this->createQueryBuilder('a')
        ->addSelect('p')
            ->leftJoin('a.id_product', 'p')
            ->andWhere('p.categoryService = :category')
            ->andWhere('p.supprime is NULL')
            ->andWhere('p.id_provider = :provider')
            ->setParameter('category', $category)
            ->setParameter('provider', $provider)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return CategoryProduct[] Returns an array of CategoryProduct objects
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
    public function findOneBySomeField($value): ?CategoryProduct
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
