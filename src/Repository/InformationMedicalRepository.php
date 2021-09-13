<?php

namespace App\Repository;

use App\Entity\InformationMedical;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InformationMedical|null find($id, $lockMode = null, $lockVersion = null)
 * @method InformationMedical|null findOneBy(array $criteria, array $orderBy = null)
 * @method InformationMedical[]    findAll()
 * @method InformationMedical[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InformationMedicalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InformationMedical::class);
    }

    // /**
    //  * @return InformationMedical[] Returns an array of InformationMedical objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InformationMedical
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
