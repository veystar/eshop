<?php

namespace App\Repository;

use App\Entity\MedicinalForm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MedicinalForm|null find($id, $lockMode = null, $lockVersion = null)
 * @method MedicinalForm|null findOneBy(array $criteria, array $orderBy = null)
 * @method MedicinalForm[]    findAll()
 * @method MedicinalForm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedicinalFormRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MedicinalForm::class);
    }

    // /**
    //  * @return MedicinalForm[] Returns an array of MedicinalForm objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MedicinalForm
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
