<?php

namespace App\Repository;

use App\Entity\Loonstroken;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Loonstroken|null find($id, $lockMode = null, $lockVersion = null)
 * @method Loonstroken|null findOneBy(array $criteria, array $orderBy = null)
 * @method Loonstroken[]    findAll()
 * @method Loonstroken[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoonstrokenRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Loonstroken::class);
    }

    // /**
    //  * @return Loonstroken[] Returns an array of Loonstroken objects
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
    public function findOneBySomeField($value): ?Loonstroken
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
