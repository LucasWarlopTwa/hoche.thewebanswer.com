<?php

namespace App\Controller\Admin;

use App\Entity\Accompagnement;
use App\Entity\Category;
use App\Entity\Day;
use App\Entity\Dessert;
use App\Entity\Dinner;
use App\Entity\Dish;
use App\Entity\DishType;
use App\Entity\Laitier;
use App\Entity\Lunch;
use App\Entity\Month;
use App\Entity\Starter;
use App\Entity\Week;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img src="images/logo/lyceehoche.svg"> Lycée Hoche')
            ->setFaviconPath('images/logo/lyceehoche.svg')
            ;
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToUrl('Retour au site', 'fas fa-link', '/'),
            MenuItem::linkToCrud('Jours', 'fas fa-calendar-day', Day::class),
            //MenuItem::linkToCrud('Jours', 'fas fa-calendar-day', Day::class),
            MenuItem::section('Repas'),
                MenuItem::linkToCrud('Déjeuners', 'fas fa-sun', Lunch::class),
                MenuItem::linkToCrud('Diners', 'fas fa-moon', Dinner::class),
            MenuItem::section('Type de plats'),
                MenuItem::linkToCrud('Entrées', 'fas fa-utensils', Starter::class),
                MenuItem::linkToCrud('Plats', 'fas fa-utensils', Dish::class),
                MenuItem::linkToCrud('Accompagnements', 'fas fa-utensils', Accompagnement::class),
                MenuItem::linkToCrud('Laitages', 'fas fa-utensils', Laitier::class),
                MenuItem::linkToCrud('Desserts', 'fas fa-utensils', Dessert::class),
            MenuItem::section('Légendes'),
                MenuItem::linkToCrud('Types', 'fas fa-list', DishType::class),
                MenuItem::linkToCrud('Catégories', 'fas fa-list', Category::class),
        ];
    }
}
