<?php

namespace App\Repository;

use App\Entity\PlannedCleaning;
use App\Entity\Provider;
use App\Entity\Parkings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * @method PlannedCleaning|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlannedCleaning|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlannedCleaning[]    findAll()
 * @method PlannedCleaning[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlannedCleaningRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PlannedCleaning::class);
    }
    public function findForAdminWorker($provider)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.Provider = :provider')
            ->andWhere('a.date >= :currentdate')
            ->andWhere('a.valide is NULL')
            ->andWhere('a.supprime is NULL')
            ->andWhere('a.facture is NOT NULL')
            ->setParameter('provider', $provider)
            ->setParameter('currentdate', new \DateTime())
            ->orderBy('a.date', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findNonValide()
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.valide = 1')
            ->andWhere('a.supprime is NULL')
            ->getQuery()
            ->getResult();
    }

    public function findByParking($code)
    {
        return $this->createQueryBuilder('a')
            ->addSelect('p')
            ->leftJoin('a.parkingId', 'p')
            ->leftJoin('p.company', 'c')
            ->andWhere('a.valide is NULL')
            ->andWhere('a.supprime is NULL')
            ->andWhere('c.code_entreprise = :code OR p.company is NULL')
            ->setParameter('code', $code)
            ->orderBy('a.date', 'DESC')
            ->getQuery()
            ->getResult();
    }


    public function findIncomingOrder()
    {
        return $this->createQueryBuilder('a')
            ->where('a.date > :currentdate')
            ->andWhere('a.valide is NULL')
            ->andWhere('a.supprime is NULL')
            ->setParameter('currentdate', new \DateTime())
            ->orderBy('a.date', 'ASC')
            ->getQuery()
            ->getResult();
    }


    public function findbyparkingandprovider($parking, $provider, $date)
    {
        return $this->createQueryBuilder('a')            
            ->where('a.parkingId = :parking')
            ->andWhere('a.Provider = :provider ')
            ->andWhere('a.date = :currentdate')
            ->andWhere('a.supprime is NULL')
            ->andWhere('a.valide is NULL')
            ->setParameter('currentdate', $date)
            ->setParameter('parking', $parking)
            ->setParameter('provider', $provider)
            ->getQuery()
            ->getScalarResult();

    }
    public function findByDateAvailability($date, $parking, $provider)
    {
        return $this->createQueryBuilder('a')
        
            ->where('a.parkingId = :parking')
            ->andWhere('a.Provider = :provider ')
            ->andWhere('a.date = :date')
            ->andWhere('a.supprime is NULL')
            ->andWhere('a.valide is NULL')
            ->andWhere('a.facture IS NOT NULL')
            ->setParameter('parking', $parking)
            ->setParameter('provider', $provider)
            ->setParameter('date', $date)
            ->getQuery()
            ->getScalarResult();
    }
    


    // /**
    //  * @return PlannedCleaning[] Returns an array of PlannedCleaning objects
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
    public function findOneBySomeField($value): ?PlannedCleaning
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
