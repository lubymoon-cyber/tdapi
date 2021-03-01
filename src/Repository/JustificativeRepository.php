<?php

namespace App\Repository;

use App\Entity\Justificative;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Justificative|null find($id, $lockMode = null, $lockVersion = null)
 * @method Justificative|null findOneBy(array $criteria, array $orderBy = null)
 * @method Justificative[]    findAll()
 * @method Justificative[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JustificativeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Justificative::class);
    }

    // /**
    //  * @return Justificative[] Returns an array of Justificative objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Justificative
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
