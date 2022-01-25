<?php

namespace App\Controller\Admin;

use App\Entity\Dessert;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DessertCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dessert::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('Dessert')
            ->setEntityLabelInPlural('Desserts')
            ;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom du dessert')->setColumns(6),
            AssociationField::new('category', 'Catégorie')->setColumns(6),
            AssociationField::new('type', 'Type')->setColumns(6),
        ];
    }
}
