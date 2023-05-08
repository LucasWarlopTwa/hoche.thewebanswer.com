<?php

namespace App\Controller\Admin;

use App\Entity\Dinner;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DinnerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dinner::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('Diner')
            ->setEntityLabelInPlural('Diners')
            ->setPaginatorPageSize(10)
            ;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('starters', 'Entrées'),
            AssociationField::new('dishes', 'Plats'),
            AssociationField::new('accompagnements', 'Accompagnements'),
            AssociationField::new('laitiers', 'Laitages'),
            AssociationField::new('desserts', 'Desserts'),
        ];
    }
}
