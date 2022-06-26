<?php

namespace App\Repository;

use App\Entity\Availability;
use App\Entity\Provider;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Availability|null find($id, $lockMode = null, $lockVersion = null)
 * @method Availability|null findOneBy(array $criteria, array $orderBy = null)
 * @method Availability[]    findAll()
 * @method Availability[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvailabilityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Availability::class);
    }


    public function findIncommingByParking($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.parking = :val')
            ->andWhere('a.is_deleted = 0')
            ->andWhere('a.date > :currentdate')
            ->setParameter('val', $value)
            ->setParameter('currentdate', new \DateTime('-1 day'))
            ->orderBy('a.date', 'ASC')
            ->getQuery()
            ->getResult();
    }


    public function findIncommingByUser($code)
    {
        return $this->createQueryBuilder('a')
            ->addSelect('p')
            ->leftJoin('a.parking', 'p')
            ->leftJoin('p.company', 'c')
            ->andWhere('a.date > :currentdate')
            ->andWhere('a.is_deleted = 0')
            ->andWhere('a.affiche = 1')
            ->andWhere('c.code_entreprise = :code OR p.company is NULL')
            ->setParameter('currentdate', new \DateTime())
            ->setParameter('code', $code)
            ->orderBy('a.date', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * used in parking controller detail
     */
    public function findIncommingByUserAndParking($user, $parking)
    {
        return $this->createQueryBuilder('a')
            ->addSelect('p')
            ->leftJoin('a.parking', 'p')
            ->leftJoin('p.company', 'c')
            ->andWhere('a.date > :currentdate')
            ->andWhere('a.parking = :parking')
            ->andWhere('a.is_deleted = 0')
            ->andWhere('a.affiche = 1')
            ->andWhere('c.code_entreprise = :user OR p.company is NULL')
            ->setParameter('currentdate', new \DateTime())
            ->setParameter('user', $user)
            ->setParameter('parking', $parking)
            ->orderBy('a.date', 'ASC')
            ->getQuery()
            ->getResult();
    }


    public function findIncomming()
    {
        return $this->createQueryBuilder('a')
            ->where('a.date > :currentdate')
            ->andWhere('a.is_deleted = 0')
            ->andWhere('a.affiche = 1')
            ->setParameter('currentdate', new \DateTime())
            ->orderBy('a.date', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * used in parking controller addavailability
     */
    public function findIncommingAdd()
    {
        return $this->createQueryBuilder('a')
            ->where('a.date > :currentdate')
            ->andWhere('a.is_deleted = 0')
            ->setParameter('currentdate', new \DateTime())
            ->orderBy('a.date', 'DESC')
            ->getQuery()
            ->getResult();
    }
    /**
     * used in parking controller addavailability
     */
    public function findIncommingByProviderAdd($provider)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.provider = :provider')
            ->andWhere('a.is_deleted = 0')
            ->andWhere('a.date > :currentdate')

            ->setParameter('provider', $provider)
            ->setParameter('currentdate', new \DateTime())
            ->orderBy('a.date', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * used in provider and parking controller
     */
    public function findIncommingByProvider($provider)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.provider = :provider')
            ->andWhere('a.is_deleted = 0')
            ->andWhere('a.date > :currentdate')
            ->andWhere('a.affiche = 1')
            ->setParameter('provider', $provider)
            ->setParameter('currentdate', new \DateTime())
            ->orderBy('a.date', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * used n Car/Wellness Services
     */
    public function avaibyproduct($product, $code)
    {

        return $this->createQueryBuilder('a')
            ->addSelect('provider')
            ->addSelect('product')
            ->leftJoin('a.parking', 'p')
            ->leftJoin('p.company', 'c')
            ->leftJoin('a.provider', 'provider')
            ->leftJoin('provider.products', 'product')
            ->andWhere('a.date > :currentdate')
            ->andWhere('a.is_deleted = 0')
            ->andWhere('a.affiche = 1')
            ->andWhere('product.supprime is NULL')
            ->andWhere('product.id = :product')
            ->andWhere('c.code_entreprise = :code OR p.company is NULL ')
            ->setParameter('currentdate', new \DateTime())
            ->setParameter('product', $product)
            ->setParameter('code', $code)
            ->orderBy('a.date', 'DESC')
            ->getQuery()->getResult();
    }

    public function avaibyproductParking($product, $code, $parking)
    {
        return $this->createQueryBuilder('a')

            ->addSelect('provider')
            ->addSelect('product')
            ->leftJoin('a.parking', 'p')
            ->leftJoin('p.company', 'c')
            ->leftJoin('a.provider', 'provider')
            ->leftJoin('provider.products', 'product')

            ->andWhere('a.date > :currentdate')
            ->andWhere('a.is_deleted = 0')
            ->andWhere('a.affiche = 1')

            ->andWhere('product.supprime is NULL')
            ->andWhere('product.id = :product')
            ->andWhere('p.id = :parking')
            ->andWhere('c.code_entreprise = :code OR p.company is NULL')

            ->setParameter('currentdate', new \DateTime())
            ->setParameter('product', $product)
            ->setParameter('code', $code)
            ->setParameter('parking', $parking)
            ->orderBy('a.date', 'DESC')
            ->getQuery()->getResult();
    }




    public function avaiblabilityByServiceZ($serviceId, $code)
    {

        return $this->createQueryBuilder('a')
            ->addSelect('p')
            ->addSelect('category')
            ->addSelect('provider')
            ->leftJoin('a.parking', 'p')
            ->leftJoin('a.provider', 'provider')
            ->leftJoin('provider.providerCat', 'category')
            ->leftJoin('category.id_category', 'cat')
            ->leftJoin('cat.idservice', 'service')
            ->andWhere('service.id = :serviceId')
            ->andWhere('a.date > :currentdate')
            ->andWhere('a.is_deleted = 0')
            ->andWhere('a.affiche = 1')
            ->andWhere('p.company = :code OR p.company is NULL')
            ->setParameter('currentdate', new \DateTime())
            ->setParameter('serviceId', $serviceId)
            ->setParameter('code', $code)
            ->orderBy('a.date', 'ASC')
            ->getQuery()
            ->getResult();
    }
    function findIncomingByServiceNeedCar($code, $category, $service)
    {

        return $this->createQueryBuilder('a')
            ->addSelect('p')
            ->addSelect('category')
            ->addSelect('provider')
            ->addSelect('cat')
            ->leftJoin('a.parking', 'p')
            ->leftJoin('a.provider', 'provider')
            ->leftJoin('provider.providerCat', 'category')
            ->leftJoin('category.id_category', 'cat')
            ->leftJoin('cat.idservice', 'service')
            ->andWhere('service.id = :serviceId')
            ->andWhere('a.date > :currentdate')
            ->andWhere('cat.id = :categoryId')
            ->andWhere('a.is_deleted = 0')
            ->andWhere('a.affiche = 1')
            ->andWhere('p.company = :code OR p.company is NULL')
            ->andWhere('cat.needCar = 1')
            ->setParameter('currentdate', new \DateTime())
            ->setParameter('categoryId', $category)
            ->setParameter('code', $code)
            ->setParameter('serviceId', $service)
            ->orderBy('a.date', 'DESC')
            ->getQuery()->getResult();
    }



    function findIncomingByServiceNoNeedCar($code, $category, $service)
    {


        return $this->createQueryBuilder('a')
            ->addSelect('p')
            ->addSelect('category')
            ->addSelect('provider')
            ->addSelect('cat')
            ->leftJoin('a.parking', 'p')
            ->leftJoin('a.provider', 'provider')
            ->leftJoin('provider.providerCat', 'category')
            ->leftJoin('category.id_category', 'cat')
            ->leftJoin('cat.idservice', 'service')
            ->andWhere('service.id = :serviceId')
            ->andWhere('a.date > :currentdate')
            ->andWhere('cat.id = :categoryId')
            ->andWhere('a.is_deleted = 0')
            ->andWhere('a.affiche = 1')
            ->andWhere('p.company = :code OR p.company is NULL')
            ->andWhere('cat.needCar = 0')
            ->setParameter('currentdate', new \DateTime())
            ->setParameter('categoryId', $category)
            ->setParameter('code', $code)
            ->setParameter('serviceId', $service)
            ->orderBy('a.date', 'DESC')
            ->getQuery()->getResult();
    }
    public function availabilitybycate($code)
    {
        return $this
            ->createQueryBuilder('a')
            ->addSelect('park')
            ->addSelect('provider')

            ->addSelect('category')
            ->addSelect('product')

            ->leftJoin('a.provider', 'provider')

            ->leftJoin('provider.products', 'product')
            ->leftJoin('a.parking', 'park')
            ->leftJoin('park.parkingCat', 'category')
            ->leftJoin('park.company', 'c')


            ->andWhere('park.company = :code OR park.company is NULL')
            ->andWhere('a.date > :currentdate')
            ->andWhere('a.is_deleted = 0')
            ->andWhere('a.affiche = 1')
            ->andWhere('product.supprime is NULL')

            ->setParameter('currentdate', new \DateTime())
            ->setParameter('code', $code)
            ->orderBy('a.date', 'ASC')
            ->getQuery()
            ->getResult();
    }
    public function availabilitybycateNull()
    {
        return $this
            ->createQueryBuilder('a')
            ->addSelect('provider')
            ->addSelect('product')
            ->leftJoin('a.provider', 'provider')
            ->leftJoin('provider.products', 'product')
            ->andWhere('product.supprime is NULL')
            ->andWhere('a.date > :currentdate')
            ->andWhere('a.is_deleted = 0')
            ->andWhere('a.affiche = 1')
            ->setParameter('currentdate', new \DateTime())


            ->orderBy('a.date', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function avaiblabilityByService($serviceId, $code)
    {
        return $this->createQueryBuilder('a')
            ->addSelect('p')
            ->addSelect('category')
            ->addSelect('provider')
            ->leftJoin('a.parking', 'p')
            ->leftJoin('a.provider', 'provider')
            ->leftJoin('provider.providerCat', 'category')
            ->leftJoin('category.id_category', 'cat')
            ->leftJoin('cat.idservice', 'service')
            ->andWhere('service.id = :serviceId')
            ->andWhere('a.date > :currentdate')
            ->andWhere('a.is_deleted = 0')
            ->andWhere('a.affiche = 1')
            ->andWhere('p.company = :code OR p.company is NULL')
            ->setParameter('currentdate', new \DateTime())
            ->setParameter('serviceId', $serviceId)
            ->setParameter('code', $code)
            ->orderBy('a.date', 'ASC')
            ->groupBy('cat.id')
            ->getQuery()
            ->getResult();
    }

    public function avaiblabilityByServicePublique($serviceId)
      {
          return $this->createQueryBuilder('a')
              ->addSelect('p')
              ->addSelect('category')
              ->addSelect('provider')
              ->leftJoin('a.parking', 'p')
              ->leftJoin('a.provider', 'provider')
              ->leftJoin('provider.providerCat', 'category')
              ->leftJoin('category.id_category', 'cat')
              ->leftJoin('cat.idservice', 'service')
              ->andWhere('service.id = :serviceId')
              ->andWhere('a.date > :currentdate')
              ->andWhere('a.is_deleted = 0')
              ->andWhere('a.affiche = 1')
              ->andWhere('p.company is NULL')
              ->setParameter('currentdate', new \DateTime())
              ->setParameter('serviceId', $serviceId)
              ->orderBy('a.date', 'ASC')
              ->groupBy('cat.id')
              ->getQuery()
              ->getResult();
      }






    // /**
    //  * @return Availability[] Returns an array of Availability objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Availability
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
