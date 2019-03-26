<?php

namespace App\Repository;

use App\Entity\Vrijvragen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Vrijvragen|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vrijvragen|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vrijvragen[]    findAll()
 * @method Vrijvragen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VrijvragenRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Vrijvragen::class);
    }

    // /**
    //  * @return Vrijvragen[] Returns an array of Vrijvragen objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vrijvragen
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
