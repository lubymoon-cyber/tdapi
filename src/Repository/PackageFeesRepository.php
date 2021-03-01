<?php

namespace App\Repository;

use App\Entity\PackageFees;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PackageFees|null find($id, $lockMode = null, $lockVersion = null)
 * @method PackageFees|null findOneBy(array $criteria, array $orderBy = null)
 * @method PackageFees[]    findAll()
 * @method PackageFees[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PackageFeesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PackageFees::class);
    }

    // /**
    //  * @return PackageFees[] Returns an array of PackageFees objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PackageFees
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
