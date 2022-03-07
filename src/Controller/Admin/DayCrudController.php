<?php

namespace App\Controller\Admin;

use App\Entity\Day;
use App\Form\DayType;
use App\Form\DinnerType;
use App\Form\LunchType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DayCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Day::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('Jour')
            ->setEntityLabelInPlural('Jours')
            ;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            //TextField::new('name', 'Nom du jours'),
            DateField::new('dateOfService', 'Date'),
            //FormField::addPanel()->setProperty('lunchOfTheDay')->setFormType(LunchType::class),
            //FormField::addPanel()->setProperty('dinnerOfTheDay')->setFormType(DinnerType::class),
            AssociationField::new('lunchOfTheDay', 'Déjeuner'),
            AssociationField::new('dinnerOfTheDay', 'Dinner'),
            AssociationField::new('week', 'Semaine')->hideOnIndex(),
        ];
    }
}
