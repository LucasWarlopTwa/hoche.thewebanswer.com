<?php

namespace App\Controller\Admin;

use App\Entity\Starter;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class StarterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Starter::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('Entrée')
            ->setEntityLabelInPlural('Entrées')
            ;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', "Nom de l'entrée")->setColumns(6),
            AssociationField::new('category', 'Catégorie')->setColumns(6),
            AssociationField::new('type', 'Type')->setColumns(6),
        ];
    }
}
