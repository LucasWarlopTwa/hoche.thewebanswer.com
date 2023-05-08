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
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'home')]
    public function index(DayRepository $dayRepository): Response
    {
		$week = $dayRepository->findDaysOfWeek();
        //$week = $this->entityManager->getRepository(Week::class)->findOneBy(['actual'=>true]);

        $days = $this->entityManager->getRepository(Day::class)->findAll();
        $categories = $this->entityManager->getRepository(Category::class)->findAll();
        $types = $this->entityManager->getRepository(DishType::class)->findAll();
        return $this->render('public/home.html.twig', [
            'week' => $week,
            'days' => $days,
            'categories' => $categories,
            'types' => $types,

        ]);
    }
    #[Route('/bientôt', name: 'soon')]
    public function soon(): Response
    {
        return $this->render('public/soon.html.twig');
    }

    #[Route('/actual/lunch', name: 'actual_lunch')]
    public function actualLunch(DayRepository $dayRepository): Response
    {
	    $week = $dayRepository->findDaysOfWeek();
        $days = $this->entityManager->getRepository(Day::class)->findAll();
        $categories = $this->entityManager->getRepository(Category::class)->findAll();
        $types = $this->entityManager->getRepository(DishType::class)->findAll();
        return $this->render('public/actual/actual_lunch.html.twig', [
            'page_title' => 'Déjeuners',
            'week' => $week,
            'days' => $days,
            'categories' => $categories,
            'types' => $types,

        ]);
    }

    #[Route('/actual/dinner', name: 'actual_dinner')]
    public function actualDinner(DayRepository $dayRepository): Response
    {
	    $week = $dayRepository->findDaysOfWeek();
        $days = $this->entityManager->getRepository(Day::class)->findAll();
        $categories = $this->entityManager->getRepository(Category::class)->findAll();
        $types = $this->entityManager->getRepository(DishType::class)->findAll();
        return $this->render('public/actual/actual_dinner.html.twig', [
            'page_title' => 'Diners',
            'week' => $week,
            'days' => $days,
            'categories' => $categories,
            'types' => $types,

        ]);
    }
}
