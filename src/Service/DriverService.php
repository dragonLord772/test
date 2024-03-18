<?php

namespace App\Service;

use App\Entity\Driver;
use App\Model\Driver\DriverRequest;
use Doctrine\ORM\EntityManagerInterface;

class DriverService
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function driverCreate(DriverRequest $request): Driver
    {
        $driver = (new Driver())
            ->setName($request->getName())
            ->setPhone($request->getPhone())
            ->setCurrentAccount(0);

        $this->em->persist($driver);
        $this->em->flush();

        return $driver;
    }

    public function driverEdit($driver, DriverRequest $request): void
    {
        $driver
            ->setName($request->getName())
            ->setPhone($request->getPhone());

        $this->em->flush();
    }
}
