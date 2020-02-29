<?php

namespace App\Repository;

use App\Entity\Dfgh;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Dfgh|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dfgh|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dfgh[]    findAll()
 * @method Dfgh[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DfghRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dfgh::class);
    }

    // /**
    //  * @return Dfgh[] Returns an array of Dfgh objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Dfgh
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
