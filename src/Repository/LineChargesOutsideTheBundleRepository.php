<?php

namespace App\Repository;

use App\Entity\LineChargesOutsideTheBundle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LineChargesOutsideTheBundle|null find($id, $lockMode = null, $lockVersion = null)
 * @method LineChargesOutsideTheBundle|null findOneBy(array $criteria, array $orderBy = null)
 * @method LineChargesOutsideTheBundle[]    findAll()
 * @method LineChargesOutsideTheBundle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LineChargesOutsideTheBundleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LineChargesOutsideTheBundle::class);
    }

    // /**
    //  * @return LineChargesOutsideTheBundle[] Returns an array of LineChargesOutsideTheBundle objects
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
    public function findOneBySomeField($value): ?LineChargesOutsideTheBundle
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
