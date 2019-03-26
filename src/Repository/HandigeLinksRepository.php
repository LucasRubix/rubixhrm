<?php

namespace App\Repository;

use App\Entity\HandigeLinks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HandigeLinks|null find($id, $lockMode = null, $lockVersion = null)
 * @method HandigeLinks|null findOneBy(array $criteria, array $orderBy = null)
 * @method HandigeLinks[]    findAll()
 * @method HandigeLinks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HandigeLinksRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HandigeLinks::class);
    }

    // /**
    //  * @return HandigeLinks[] Returns an array of HandigeLinks objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HandigeLinks
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
