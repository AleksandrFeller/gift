<?php

namespace App\Repository;

use App\Entity\ItemsSections;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ItemsSections|null find($id, $lockMode = null, $lockVersion = null)
 * @method ItemsSections|null findOneBy(array $criteria, array $orderBy = null)
 * @method ItemsSections[]    findAll()
 * @method ItemsSections[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemsSectionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ItemsSections::class);
    }

    // /**
    //  * @return ItemsSections[] Returns an array of ItemsSections objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ItemsSections
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
