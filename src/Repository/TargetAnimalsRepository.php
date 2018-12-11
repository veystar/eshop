<?php

namespace App\Repository;

use App\Entity\TargetAnimals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TargetAnimals|null find($id, $lockMode = null, $lockVersion = null)
 * @method TargetAnimals|null findOneBy(array $criteria, array $orderBy = null)
 * @method TargetAnimals[]    findAll()
 * @method TargetAnimals[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TargetAnimalsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TargetAnimals::class);
    }

    // /**
    //  * @return TargetAnimals[] Returns an array of TargetAnimals objects
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
    public function findOneBySomeField($value): ?TargetAnimals
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
