<?php

namespace App\Repository;

use App\Entity\FamilyNucleus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FamilyNucleus>
 *
 * @method FamilyNucleus|null find($id, $lockMode = null, $lockVersion = null)
 * @method FamilyNucleus|null findOneBy(array $criteria, array $orderBy = null)
 * @method FamilyNucleus[]    findAll()
 * @method FamilyNucleus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FamilyNucleusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FamilyNucleus::class);
    }

    public function add(FamilyNucleus $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(FamilyNucleus $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return FamilyNucleus[] Returns an array of FamilyNucleus objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FamilyNucleus
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
