<?php

namespace App\Repository;

use App\Entity\LineFeePackage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LineFeePackage|null find($id, $lockMode = null, $lockVersion = null)
 * @method LineFeePackage|null findOneBy(array $criteria, array $orderBy = null)
 * @method LineFeePackage[]    findAll()
 * @method LineFeePackage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LineFeePackageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LineFeePackage::class);
    }

    // /**
    //  * @return LineFeePackage[] Returns an array of LineFeePackage objects
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
    public function findOneBySomeField($value): ?LineFeePackage
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
