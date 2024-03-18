<?php

namespace App\Repository;

use App\Entity\FinanceHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FinanceHistory>
 *
 * @method FinanceHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method FinanceHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method FinanceHistory[]    findAll()
 * @method FinanceHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FinanceHistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FinanceHistory::class);
    }
}
