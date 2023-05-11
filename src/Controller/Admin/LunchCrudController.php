<?php

namespace App\Controller\Admin;

use App\Entity\Lunch;
use App\Form\StarterType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
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
			AssociationField::new('starters', 'Entrées'),
            AssociationField::new('dishes', 'Plats'),
            AssociationField::new('accompagnements', 'Accompagnements'),
            AssociationField::new('laitiers', 'Laitages'),
            AssociationField::new('desserts', 'Desserts'),
        ];
    }
}
