<?php

namespace App\Repository;

use App\Entity\Provider;
use App\Entity\Parkings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Provider|null find($id, $lockMode = null, $lockVersion = null)
 * @method Provider|null findOneBy(array $criteria, array $orderBy = null)
 * @method Provider[]    findAll()
 * @method Provider[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProviderRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Provider::class);
    }

    public function allprovider()
    {
        return $this
            ->createQueryBuilder('p')
            ->where('p.supprime is NULL')
            ->getQuery()
            ->getResult();
    }

    public function findProviderByParking($parking)
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.providerCat', 'c')
            ->leftJoin('c.id_category', 'cat')
            ->leftJoin('cat.idcat', 'ct')
            ->where('p.id = c.id_provider')
            ->andWhere('ct.id_location = :parking')
            ->andWhere('p.supprime = 0')
            ->setParameter('parking', $parking)
            ->getQuery()
            ->getResult();
    }
  

    // /**
    //  * @return Provider[] Returns an array of Provider objects
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
    public function findOneBySomeField($value): ?Provider
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
