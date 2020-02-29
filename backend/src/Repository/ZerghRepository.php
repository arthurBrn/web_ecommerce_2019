<?php

namespace App\Repository;

use App\Entity\Zergh;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Zergh|null find($id, $lockMode = null, $lockVersion = null)
 * @method Zergh|null findOneBy(array $criteria, array $orderBy = null)
 * @method Zergh[]    findAll()
 * @method Zergh[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZerghRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Zergh::class);
    }

    // /**
    //  * @return Zergh[] Returns an array of Zergh objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('z.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Zergh
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
