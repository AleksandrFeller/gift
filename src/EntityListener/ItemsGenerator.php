<?php


namespace App\EntityListener;

use App\Entity\Items;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;


class ItemsGenerator
{
    private $slugger;
    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function prePersist(Items $item, LifecycleEventArgs $event)
    {
        $item->computeSlug($this->slugger);
        $item->computeXml();
    }

    public function preUpdate(Items $item, LifecycleEventArgs $event)
    {
        $item->computeSlug($this->slugger);
    }
}