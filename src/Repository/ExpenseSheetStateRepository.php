<?php

namespace App\Repository;

use App\Entity\ExpenseSheetState;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExpenseSheetState|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExpenseSheetState|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExpenseSheetState[]    findAll()
 * @method ExpenseSheetState[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExpenseSheetStateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExpenseSheetState::class);
    }

    // /**
    //  * @return ExpenseSheetState[] Returns an array of ExpenseSheetState objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ExpenseSheetState
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
