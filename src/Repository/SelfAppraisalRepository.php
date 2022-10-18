<?php

namespace App\Repository;

use App\Entity\SelfAppraisal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SelfAppraisal>
 *
 * @method SelfAppraisal|null find($id, $lockMode = null, $lockVersion = null)
 * @method SelfAppraisal|null findOneBy(array $criteria, array $orderBy = null)
 * @method SelfAppraisal[]    findAll()
 * @method SelfAppraisal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SelfAppraisalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SelfAppraisal::class);
    }

    public function save(SelfAppraisal $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SelfAppraisal $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SelfAppraisal[] Returns an array of SelfAppraisal objects
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

//    public function findOneBySomeField($value): ?SelfAppraisal
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
