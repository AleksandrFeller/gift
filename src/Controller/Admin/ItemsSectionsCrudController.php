<?php

namespace App\Controller\Admin;

use App\Entity\ItemsSections;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ItemsSectionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ItemsSections::class;
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
