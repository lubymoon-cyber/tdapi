<?php

namespace App\Repository;

use App\Entity\LineStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LineStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method LineStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method LineStatus[]    findAll()
 * @method LineStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LineStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LineStatus::class);
    }

    // /**
    //  * @return LineStatus[] Returns an array of LineStatus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LineStatus
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
