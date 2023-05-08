<?php

namespace App\Repository;

use App\Entity\Day;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Day|null find($id, $lockMode = null, $lockVersion = null)
 * @method Day|null findOneBy(array $criteria, array $orderBy = null)
 * @method Day[]    findAll()
 * @method Day[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Day::class);
    }

    // /**
    //  * @return Day[] Returns an array of Day objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

	public function findDaysOfWeek(): array
	{
		$currentDate = new \DateTimeImmutable('now');
		$monday = $currentDate->modify('monday this week');
		$sunday = $currentDate->modify('sunday this week');

		$qb = $this->createQueryBuilder('d')
			->where('d.dateOfService >= :monday')
			->andWhere('d.dateOfService <= :sunday')
			->setParameter('monday', $monday)
			->setParameter('sunday', $sunday)
			->orderBy('d.dateOfService', 'ASC');

		return $qb->getQuery()->getResult();
	}

    /*
    public function findOneBySomeField($value): ?Day
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
