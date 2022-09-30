<?php

namespace App\Repository;

use App\Entity\StudiesCurrently;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StudiesCurrently>
 *
 * @method StudiesCurrently|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudiesCurrently|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudiesCurrently[]    findAll()
 * @method StudiesCurrently[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudiesCurrentlyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudiesCurrently::class);
    }

    public function add(StudiesCurrently $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(StudiesCurrently $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return StudiesCurrently[] Returns an array of StudiesCurrently objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?StudiesCurrently
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
