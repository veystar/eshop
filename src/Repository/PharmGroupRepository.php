<?php

namespace App\Repository;

use App\Entity\PharmGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PharmGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method PharmGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method PharmGroup[]    findAll()
 * @method PharmGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PharmGroupRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PharmGroup::class);
    }

    // /**
    //  * @return PharmGroup[] Returns an array of PharmGroup objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PharmGroup
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
