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
            TextField::new('name', 'Nom du Déjeuner')->setColumns(6),
            AssociationField::new('starters', 'Entrées')->setColumns(6),
            AssociationField::new('dishes', 'Plats')->setColumns(6),
            AssociationField::new('desserts', 'Desserts')->setColumns(6),
            AssociationField::new('accompagnements', 'Accompagnements')->setColumns(6),
            AssociationField::new('laitiers', 'Laitages')->setColumns(6),
        ];
    }
}
