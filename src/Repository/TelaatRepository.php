<?php

namespace App\Repository;

use App\Entity\Telaat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Telaat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Telaat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Telaat[]    findAll()
 * @method Telaat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TelaatRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Telaat::class);
    }

    // /**
    //  * @return Telaat[] Returns an array of Telaat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Telaat
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
