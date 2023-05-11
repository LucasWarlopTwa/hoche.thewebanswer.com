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
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;

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
	        ->setDefaultSort(['dateOfService' => 'DESC'])
	        ->showEntityActionsInlined();

    }

	public function configureFilters(Filters $filters): Filters
	{
		return $filters
			->add('dateOfService')
			;
	}

	public function configureActions(Actions $actions): Actions
	{
		return $actions
			->add(Crud::PAGE_EDIT, Action::SAVE_AND_ADD_ANOTHER)
			;
	}
    public function configureFields(string $pageName): iterable
    {
        return [
	        FormField::addTab('Date'),
            //TextField::new('name', 'Nom du jours'),
            DateField::new('dateOfService', 'Date')->setFormat('long'),
	        FormField::addTab('Déjeuner'),
	        AssociationField::new('lunch', 'Déjeuner')->hideOnIndex()->renderAsEmbeddedForm(),
	        FormField::addTab('Diner'),
            AssociationField::new('dinner', 'Dinner')->hideOnIndex()->renderAsEmbeddedForm(),
        ];
    }
}

