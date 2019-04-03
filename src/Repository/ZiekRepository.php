<?php

namespace App\Repository;

use App\Entity\Ziek;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ziek|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ziek|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ziek[]    findAll()
 * @method Ziek[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZiekRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ziek::class);
    }

    // /**
    //  * @return Ziek[] Returns an array of Ziek objects
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
    public function findOneBySomeField($value): ?Ziek
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
