<?php

namespace App\Repository;

use App\Entity\Starter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Starter|null find($id, $lockMode = null, $lockVersion = null)
 * @method Starter|null findOneBy(array $criteria, array $orderBy = null)
 * @method Starter[]    findAll()
 * @method Starter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StarterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Starter::class);
    }

    // /**
    //  * @return Starter[] Returns an array of Starter objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Starter
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
