<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Day;
use App\Entity\Dinner;
use App\Entity\DishType;
use App\Entity\Lunch;
use App\Entity\Week;
use App\Repository\DayRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_home')]
    public function index(DayRepository $dayRepository): Response
    {
        return $this->redirectToRoute('actual_week_lunch');
    }

    #[Route('/bientôt', name: 'soon')]
    public function soon(): Response
    {
        return $this->render('public/soon.html.twig');
    }

    #[Route('/déjeuners/semaines', name: 'actual_week_lunch')]
    public function actualWeekLunch(DayRepository $dayRepository): Response
    {
	    $weekData = $dayRepository->findDaysOfActualWeek();
        $categories = $this->entityManager->getRepository(Category::class)->findAll();
        $types = $this->entityManager->getRepository(DishType::class)->findAll();
        return $this->render('public/actual/actual_lunch_week.html.twig', [
	        'page_title' => 'Déjeuners de la semaine',
	        'week' => $weekData['days'],
	        'start' => $weekData['start'],
	        'end' => $weekData['end'],
	        'categories' => $categories,
	        'types' => $types,
        ]);
    }

	/**
	 * @throws Exception
	 */
	#[Route('/semaines/{date}', name: 'actual_week')]
    public function actualWeek(DayRepository $dayRepository, $date = null): Response
    {
	    if ($date === null) {
		    $date = (new \DateTime())->format('o-\WW');
	    }
	    $weekData = $dayRepository->findDaysOfWeeks(new \DateTime($date));
        $categories = $this->entityManager->getRepository(Category::class)->findAll();
        $types = $this->entityManager->getRepository(DishType::class)->findAll();
        return $this->render('public/week.html.twig', [
	        'page_title' => 'Déjeuners et Diners',
	        'week' => $weekData['days'],
	        'start' => $weekData['start'],
	        'end' => $weekData['end'],
	        'categories' => $categories,
	        'types' => $types,
        ]);
    }
    #[Route('/diner/semaines', name: 'actual_week_dinner')]
    public function actualWeekDinner(DayRepository $dayRepository): Response
    {
	    $weekData = $dayRepository->findDaysOfActualWeek();
        $categories = $this->entityManager->getRepository(Category::class)->findAll();
        $types = $this->entityManager->getRepository(DishType::class)->findAll();
        return $this->render('public/actual/actual_dinner_week.html.twig', [
	        'page_title' => 'Diners de la semaine',
	        'week' => $weekData['days'],
	        'start' => $weekData['start'],
	        'end' => $weekData['end'],
	        'categories' => $categories,
	        'types' => $types,
        ]);
    }

	#[Route('/déjeuners/mois', name: 'actual_month_lunch')]
	public function actualMonthLunch(DayRepository $dayRepository): Response
	{
		$month = $dayRepository->findWeeksOfMonth();
		$categories = $this->entityManager->getRepository(Category::class)->findAll();
		$types = $this->entityManager->getRepository(DishType::class)->findAll();
		return $this->render('public/actual/actual_lunch_month.html.twig', [
			'page_title' => 'Déjeuners du mois',
			'month' => $month,
			'categories' => $categories,
			'types' => $types,
		]);
	}

	#[Route('/diner/mois', name: 'actual_month_dinner')]
	public function actualMonthDinner(DayRepository $dayRepository): Response
	{
		$month = $dayRepository->findWeeksOfMonth();
		$categories = $this->entityManager->getRepository(Category::class)->findAll();
		$types = $this->entityManager->getRepository(DishType::class)->findAll();
		return $this->render('public/actual/actual_dinner_month.html.twig', [
			'page_title' => 'Diners du mois',
			'month' => $month,
			'categories' => $categories,
			'types' => $types,
		]);
	}

	//ADMIN

	#[Route('/déjeuners/année', name: 'lunch_by_year')]
	#[IsGranted('ROLE_ADMIN')]
	public function lunchYear(DayRepository $dayRepository): Response
	{
		$year = date("Y");
		$weeks = [];
		for ($week = 1; $week <= 52; $week++) {
			$startDate = date('Y-m-d', strtotime($year . 'W' . str_pad($week, 2, '0', STR_PAD_LEFT) . '1'));
			$endDate = date('Y-m-d', strtotime($year . 'W' . str_pad($week, 2, '0', STR_PAD_LEFT) . '7'));
			$weekData = ['start' => $startDate, 'end' => $endDate, 'days' => []];
			for ($day = 1; $day <= 7; $day++) {
				$date = date('Y-m-d', strtotime($year . 'W' . str_pad($week, 2, '0', STR_PAD_LEFT) . $day));
				$dayData = $dayRepository->findDayData($date);
				if ($dayData) {
					$weekData['days'][] = $dayData;
				}
			}
			$weeks[] = $weekData;
		}
		$categories = $this->entityManager->getRepository(Category::class)->findAll();
		$types = $this->entityManager->getRepository(DishType::class)->findAll();
		return $this->render('public/actual/actual_lunch_year.html.twig', [
			'page_title' => 'Déjeuners',
			'year' => $year,
			'weeks' => $weeks,
			'categories' => $categories,
			'types' => $types,
		]);
	}

	/**
	 * @throws Exception
	 */
	#[Route('/déjeuners/semaines/{date}', name: 'lunch_by_week')]
	#[IsGranted('ROLE_ADMIN')]
	public function lunchWeek(DayRepository $dayRepository, $date): Response
	{
		$weekData = $dayRepository->findDaysOfWeeks(new \DateTime($date));
		$categories = $this->entityManager->getRepository(Category::class)->findAll();
		$types = $this->entityManager->getRepository(DishType::class)->findAll();
		return $this->render('public/actual/actual_lunch_week.html.twig', [
			'page_title' => 'Diners',
			'week' => $weekData['days'],
			'start' => $weekData['start'],
			'end' => $weekData['end'],
			'categories' => $categories,
			'types' => $types,
		]);
	}

	/**
	 * @throws Exception
	 */
	#[Route('/diners/semaines/{date}', name: 'dinner_by_week')]
	#[IsGranted('ROLE_ADMIN')]
	public function dinnerWeek(DayRepository $dayRepository, $date): Response
	{
		$weekData = $dayRepository->findDaysOfWeeks(new \DateTime($date));
		$categories = $this->entityManager->getRepository(Category::class)->findAll();
		$types = $this->entityManager->getRepository(DishType::class)->findAll();
		return $this->render('public/actual/actual_dinner_week.html.twig', [
			'page_title' => 'Diners',
			'week' => $weekData['days'],
			'start' => $weekData['start'],
			'end' => $weekData['end'],
			'categories' => $categories,
			'types' => $types,
		]);
	}


}
