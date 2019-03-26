<?php

namespace App\Repository;

use App\Entity\Urenverantwoording;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Urenverantwoording|null find($id, $lockMode = null, $lockVersion = null)
 * @method Urenverantwoording|null findOneBy(array $criteria, array $orderBy = null)
 * @method Urenverantwoording[]    findAll()
 * @method Urenverantwoording[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UrenverantwoordingRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Urenverantwoording::class);
    }

    // /**
    //  * @return Urenverantwoording[] Returns an array of Urenverantwoording objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Urenverantwoording
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
