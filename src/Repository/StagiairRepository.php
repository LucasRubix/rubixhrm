<?php

namespace App\Repository;

use App\Entity\Stagiair;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Stagiair|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stagiair|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stagiair[]    findAll()
 * @method Stagiair[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StagiairRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Stagiair::class);
    }

    // /**
    //  * @return Stagiair[] Returns an array of Stagiair objects
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
    public function findOneBySomeField($value): ?Stagiair
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
