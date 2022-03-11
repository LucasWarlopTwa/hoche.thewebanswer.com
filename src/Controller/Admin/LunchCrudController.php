<?php

namespace App\Controller\Admin;

use App\Entity\Lunch;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LunchCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Lunch::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('Déjeuner')
            ->setEntityLabelInPlural('Déjeuners')
            ;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom du Déjeuner'),
            AssociationField::new('starters', 'Entrées'),
            AssociationField::new('dishes', 'Plats'),
            AssociationField::new('accompagnements', 'Accompagnements'),
            AssociationField::new('desserts', 'Desserts'),
            AssociationField::new('laitiers', 'Laitages'),
        ];
    }
}
