<?php

namespace App\Controller\Admin;

use App\Entity\Week;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class WeekCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Week::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom du jours'),
            BooleanField::new('actual', 'En ce moment'),
            SlugField::new('slug', 'Slug')->setTargetFieldName('name')->hideOnIndex(),

        ];
    }
}
