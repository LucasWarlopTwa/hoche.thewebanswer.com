<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\DishType;
use App\Entity\Week;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeekController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/semaines', name: 'weeks')]
    public function index(): Response
    {
        $weeks = $this->entityManager->getRepository(Week::class)->findAll();
        return $this->render('public/weeks.html.twig', [
            'page_title' => 'Semaines',
            'weeks' => $weeks,
            'week' => true,
        ]);
    }

    #[Route('/semaines/{slug}', name: 'week')]
    public function movie($slug): Response
    {
        $week = $this->entityManager->getRepository(Week::class)->findOneBySlug($slug);
        $categories = $this->entityManager->getRepository(Category::class)->findAll();
        $types = $this->entityManager->getRepository(DishType::class)->findAll();
        return $this->render('public/week.html.twig', [
            "week" => $week,
            "categories" => $categories,
            "types" => $types,
        ]);
    }
}
