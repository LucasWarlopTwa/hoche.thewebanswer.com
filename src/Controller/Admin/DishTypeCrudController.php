<?php

namespace App\Controller\Admin;

use App\Entity\DishType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DishTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DishType::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('Type')
            ->setEntityLabelInPlural('Types')
            ;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom du type')->setColumns(6),
            ColorField::new('codeCouleur', 'Code Couleur')->setColumns(6),
            TextareaField::new('description', 'Description')->setColumns(6),
            SlugField::new('slug', 'Slug')->setTargetFieldName('codeCouleur')->setColumns(6),
        ];
    }
}
