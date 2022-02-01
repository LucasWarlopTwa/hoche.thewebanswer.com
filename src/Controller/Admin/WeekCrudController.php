<?php

namespace App\Controller\Admin;

use App\Entity\Week;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class WeekCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Week::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
