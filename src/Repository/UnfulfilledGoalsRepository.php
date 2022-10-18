<?php

namespace App\Repository;

use App\Entity\UnfulfilledGoals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UnfulfilledGoals>
 *
 * @method UnfulfilledGoals|null find($id, $lockMode = null, $lockVersion = null)
 * @method UnfulfilledGoals|null findOneBy(array $criteria, array $orderBy = null)
 * @method UnfulfilledGoals[]    findAll()
 * @method UnfulfilledGoals[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UnfulfilledGoalsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UnfulfilledGoals::class);
    }

    public function save(UnfulfilledGoals $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(UnfulfilledGoals $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return UnfulfilledGoals[] Returns an array of UnfulfilledGoals objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UnfulfilledGoals
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
