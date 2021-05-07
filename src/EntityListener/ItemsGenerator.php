<?php


namespace App\EntityListener;

use App\Entity\Items;
use Doctrine\ORM\Event\LifecycleEventArgs;


class ItemsGenerator
{


    public function prePersist(Items $item)
    {
        $item->computeSlug();
        $item->computeXml();
    }

    public function preUpdate(Items $item)
    {
        $item->computeSlug();
    }
}