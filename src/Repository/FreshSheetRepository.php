<?php

namespace App\Repository;

use App\Entity\FreshSheet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FreshSheet|null find($id, $lockMode = null, $lockVersion = null)
 * @method FreshSheet|null findOneBy(array $criteria, array $orderBy = null)
 * @method FreshSheet[]    findAll()
 * @method FreshSheet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FreshSheetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FreshSheet::class);
    }

    // /**
    //  * @return FreshSheet[] Returns an array of FreshSheet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FreshSheet
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
