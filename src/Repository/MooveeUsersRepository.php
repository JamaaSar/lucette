<?php

namespace App\Repository;

use App\Entity\MooveeUsers;
use App\Entity\Provider;
use App\Entity\MooveeCompany;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MooveeUsers|null find($id, $lockMode = null, $lockVersion = null)
 * @method MooveeUsers|null findOneBy(array $criteria, array $orderBy = null)
 * @method MooveeUsers[]    findAll()
 * @method MooveeUsers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MooveeUsersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MooveeUsers::class);
    }
  
    public function findUserByProvider(Provider $provider){
        return $this
            ->createQueryBuilder('p')
            ->where('p.Provider = :Provider')
            ->andWhere('p.is_deleted is NULL')
            ->setParameter('Provider', $provider)
            ->getQuery()
            ->getResult();
    }
    public function findWorkers(Provider $provider)
    {
        return $this
            ->createQueryBuilder('u')
            ->where('u.Provider = :Provider')
            ->andWhere('u.roles like :roles')
            ->andWhere('u.is_deleted is NULL')
            ->setParameter('Provider', $provider)
            ->setParameter('roles', '%"'.'ROLE_WORKER%'.'"%')
            ->getQuery()
            ->getResult();

    }
  
    public function getAllWorkers()
    {
        return $this
            ->createQueryBuilder('u')
            ->where('u.roles like :rolesA OR u.roles like :rolesB')
            ->andWhere('u.is_deleted is NULL')
            ->setParameter('rolesA', '%"'.'ROLE_WORKER%'.'"%')
            ->setParameter('rolesB', '%"'.'ROLE_WORKER_ADMIN%'.'"%')
            ->getQuery()
            ->getResult();

    }

    public function getClientsWithoutCode()
    {

        $subquery = $this->_em
            ->createQueryBuilder()
            ->select('c.code_entreprise')
            ->from('App\Entity\MooveeCompany', 'c')
            ->getDQL();           
            $qb = $this->_em 
            ->createQueryBuilder();
            $qb
            ->select('u')
            ->from('App\Entity\MooveeUsers', 'u')
            ->where($qb->expr()->notIn('u.code_company', $subquery))
            ->orWhere($qb->expr()->isNull('u.code_company'))
            ->andWhere($qb->expr()->isNull('u.is_deleted'));
        return $qb->getQuery()->getResult();

    }

    
    public function findUsersMissingToken()
    {
        return $this
            ->createQueryBuilder('u')
            ->where('u.verifyToken IS NOT NULL')
            ->andWhere('u.is_deleted is NULL')
            ->getQuery()
            ->getResult();
    }

    public function findAdminWorkerByProvider($provider){
        return $this
            ->createQueryBuilder('u')
            ->where('u.Provider = :Provider')
            ->andWhere('u.roles like :roles')
            ->andWhere('u.is_deleted is NULL')
            ->setParameter('Provider', $provider)
            ->setParameter('roles', '%"' . 'ROLE_WORKER_ADMIN%' . '"%')
            ->getQuery()
            ->getResult();

    }

    public function finduserbyname()
    {
        return $this
            ->createQueryBuilder('u')
            ->where('u.verifyToken IS NOT NULL')
            ->andWhere('u.is_deleted is NULL')
            ->getQuery()
            ->getResult();
    }
   
    //  * @return MooveeUsers[] Returns an array of MooveeUsers objects
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
    public function findOneBySomeField($value): ?MooveeUsers
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
