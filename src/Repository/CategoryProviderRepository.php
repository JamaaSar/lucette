<?php

namespace App\Repository;

use App\Entity\CategoryProvider;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Entity\Provider;

/**
 * @method CategoryProvider|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryProvider|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryProvider[]    findAll()
 * @method CategoryProvider[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryProviderRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CategoryProvider::class);
    }

    public function categoryByProvider(Provider $provider)
    {
        return $this
            ->createQueryBuilder('p')
            ->where('p.id_provider= :provider')
            ->setParameter('provider', $provider)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return CategoryProvider[] Returns an array of CategoryProvider objects
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
    public function findOneBySomeField($value): ?CategoryProvider
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
