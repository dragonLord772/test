<?php

namespace App\Service;

use App\Entity\FinanceHistory;
use App\Model\Finance\FinanceRequest;
use App\Repository\DriverRepository;
use Doctrine\ORM\EntityManagerInterface;

class FinanceDriverService
{
    public function __construct(private EntityManagerInterface $em, private DriverRepository $driverRepository)
    {
    }

    public function financeCreate(FinanceRequest $request): void
    {
        $driverId = $request->getDriverId();
        $driver = $this->driverRepository->find($driverId);

        $amount = $driver->getCurrentAccount() + $request->getAmount();


        $finance = (new FinanceHistory())
            ->setDriverId($request->getDriverId())
            ->setAmount($amount)
            ->setDate(new \DateTimeImmutable());

        $driver->setCurrentAccount($amount);

        $this->em->persist($finance);
        $this->em->flush();
    }
}
