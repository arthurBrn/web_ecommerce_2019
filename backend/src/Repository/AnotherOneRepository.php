<?php

namespace App\Repository;

use App\Entity\AnotherOne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AnotherOne|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnotherOne|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnotherOne[]    findAll()
 * @method AnotherOne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnotherOneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnotherOne::class);
    }

    // /**
    //  * @return AnotherOne[] Returns an array of AnotherOne objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AnotherOne
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
