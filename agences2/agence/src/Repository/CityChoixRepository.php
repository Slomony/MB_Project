<?php

namespace App\Repository;

use App\Entity\CityChoix;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CityChoix|null find($id, $lockMode = null, $lockVersion = null)
 * @method CityChoix|null findOneBy(array $criteria, array $orderBy = null)
 * @method CityChoix[]    findAll()
 * @method CityChoix[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CityChoixRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CityChoix::class);
    }

    // /**
    //  * @return CityChoix[] Returns an array of CityChoix objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CityChoix
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    /**
     * 
     */

    
}
