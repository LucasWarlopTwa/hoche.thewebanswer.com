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

	public function findDaysOfActualWeek(): array
	{
		// Determine the current date
		$date = new \DateTime();

		// Determine the start and end date of the week
		$start = clone $date;
		$start->modify('monday this week');
		$end = clone $start;
		$end->modify('sunday this week');

		// Query the database for days within the week
		$query = $this->createQueryBuilder('d')
			->where('d.dateOfService >= :start')
			->andWhere('d.dateOfService <= :end')
			->setParameter('start', $start)
			->setParameter('end', $end)
			->orderBy('d.dateOfService', 'ASC')
			->getQuery();

		// Return the results along with the start and end dates
		return [
			'start' => $start,
			'end' => $end,
			'days' => $query->getResult(),
		];
	}


	public function findWeeksOfMonth(): array
	{
		$currentDate = new \DateTimeImmutable('now');
		$firstDayOfMonth = $currentDate->modify('first day of this month');
		$lastDayOfMonth = $currentDate->modify('last day of this month');

		$weeks = [];
		for($i=0; $i<4; $i++) {
			$monday = $firstDayOfMonth->modify('+' . $i*7 . ' days');
			$sunday = min($monday->modify('+6 days'), $lastDayOfMonth);

			$start = clone $monday;
			$start = $start->modify('monday this week');
			$end = clone $start;
			$end = $end->modify('sunday this week');

			$qb = $this->createQueryBuilder('d')
				->where('d.dateOfService >= :monday')
				->andWhere('d.dateOfService <= :sunday')
				->setParameter('monday', $start)
				->setParameter('sunday', $end)
				->orderBy('d.dateOfService', 'ASC');

			$weeks[] = [
				'start' => $monday,
				'end' => $sunday,
				'days' => $qb->getQuery()->getResult(),
			];
		}

		return $weeks;
	}


	public function findDayData($date)
	{
		return $this->createQueryBuilder('d')
			->andWhere('d.dateOfService = :val')
			->setParameter('val', $date)
			->getQuery()
			->getOneOrNullResult();
	}

	public function findDaysOfWeeks(\DateTime $date)
	{
		// Determine the start and end date of the week
		$start = clone $date;
		$start->modify('monday this week');
		$end = clone $start;
		$end->modify('sunday this week');

		// Query the database for days within the week
		$query = $this->createQueryBuilder('d')
			->where('d.dateOfService >= :start')
			->andWhere('d.dateOfService <= :end')
			->setParameter('start', $start)
			->setParameter('end', $end)
			->orderBy('d.dateOfService', 'ASC')
			->getQuery();

		// Return the results along with the start and end dates
		return [
			'start' => $start,
			'end' => $end,
			'days' => $query->getResult(),
		];
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
