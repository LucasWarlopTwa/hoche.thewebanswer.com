<?php

namespace App\Repository;

use App\Entity\Laitier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Laitier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Laitier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Laitier[]    findAll()
 * @method Laitier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LaitierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Laitier::class);
    }

    // /**
    //  * @return Laitier[] Returns an array of Laitier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Laitier
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
