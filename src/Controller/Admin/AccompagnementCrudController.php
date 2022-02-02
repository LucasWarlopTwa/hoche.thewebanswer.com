<?php

namespace App\Controller\Admin;

use App\Entity\Accompagnement;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AccompagnementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Accompagnement::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('Accompagnement')
            ->setEntityLabelInPlural('Accompagnements')
            ;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', "Nom de l'accompagnement")->setColumns(6),
            AssociationField::new('category', 'Catégorie')->setColumns(6),
            AssociationField::new('type', 'Type')->setColumns(6),
        ];
    }
}
