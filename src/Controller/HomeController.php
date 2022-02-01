<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Day;
use App\Entity\Dinner;
use App\Entity\DishType;
use App\Entity\Lunch;
use App\Entity\Week;
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
    public function index(): Response
    {
        $week = $this->entityManager->getRepository(Week::class)->findOneBy(['actual'=>true]);
        $days = $this->entityManager->getRepository(Day::class)->findAll();
        $categories = $this->entityManager->getRepository(Category::class)->findAll();
        $types = $this->entityManager->getRepository(DishType::class)->findAll();
        return $this->render('home/index.html.twig', [
            'week' => $week,
            'days' => $days,
            'categories' => $categories,
            'types' => $types,

        ]);
    }
}
