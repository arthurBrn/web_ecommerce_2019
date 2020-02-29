<?php

namespace App\Repository;

use App\Entity\Sometry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Sometry|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sometry|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sometry[]    findAll()
 * @method Sometry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SometryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sometry::class);
    }

    // /**
    //  * @return Sometry[] Returns an array of Sometry objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sometry
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
