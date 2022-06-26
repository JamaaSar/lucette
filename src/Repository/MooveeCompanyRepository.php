<?php

namespace App\Repository;

use App\Entity\MooveeCompany;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MooveeCompany|null find($id, $lockMode = null, $lockVersion = null)
 * @method MooveeCompany|null findOneBy(array $criteria, array $orderBy = null)
 * @method MooveeCompany[]    findAll()
 * @method MooveeCompany[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MooveeCompanyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MooveeCompany::class);
    }

 public function findIdCompanyByCode(string $code){
        return $this
            ->createQueryBuilder('p')
            ->where('p.code_entreprise = :code')
            ->setParameter('code', $code)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return MooveeCompany[] Returns an array of MooveeCompany objects
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
    public function findOneBySomeField($value): ?MooveeCompany
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
