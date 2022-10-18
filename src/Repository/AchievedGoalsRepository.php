<?php

namespace App\Repository;

use App\Entity\AchievedGoals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AchievedGoals>
 *
 * @method AchievedGoals|null find($id, $lockMode = null, $lockVersion = null)
 * @method AchievedGoals|null findOneBy(array $criteria, array $orderBy = null)
 * @method AchievedGoals[]    findAll()
 * @method AchievedGoals[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AchievedGoalsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AchievedGoals::class);
    }

    public function save(AchievedGoals $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(AchievedGoals $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return AchievedGoals[] Returns an array of AchievedGoals objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AchievedGoals
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
