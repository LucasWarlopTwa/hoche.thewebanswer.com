<?php

namespace App\Controller\Admin;

use App\Entity\Laitier;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LaitierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Laitier::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('Laitage')
            ->setEntityLabelInPlural('Laitages')
            ;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', "Nom du produit laitier")->setColumns(6),
            AssociationField::new('category', 'Catégorie')->setColumns(6),
            AssociationField::new('type', 'Type')->setColumns(6),
        ];
    }
}
