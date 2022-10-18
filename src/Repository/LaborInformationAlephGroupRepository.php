<?php

namespace App\Repository;

use App\Entity\LaborInformationAlephGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LaborInformationAlephGroup>
 *
 * @method LaborInformationAlephGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method LaborInformationAlephGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method LaborInformationAlephGroup[]    findAll()
 * @method LaborInformationAlephGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LaborInformationAlephGroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LaborInformationAlephGroup::class);
    }

    public function save(LaborInformationAlephGroup $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(LaborInformationAlephGroup $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return LaborInformationAlephGroup[] Returns an array of LaborInformationAlephGroup objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LaborInformationAlephGroup
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
