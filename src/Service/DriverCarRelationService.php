<?php

namespace App\Service;

use App\Model\DriverCarRelation\DriverCarRelationRequest;
use App\Repository\CarRepository;
use App\Repository\DriverRepository;
use Doctrine\ORM\EntityManagerInterface;

class DriverCarRelationService
{
    public function __construct(private EntityManagerInterface $em, private DriverRepository $driverRepository, private CarRepository $carRepository)
    {
    }

    public function relation(DriverCarRelationRequest $request): void
    {
        $driverId = $request->getDriverId();
        $carId = $request->getCarId();

        $driver = $this->driverRepository->find($driverId);
        $car = $this->carRepository->find($carId);

        $car->addDriver($driver);

        $this->em->flush();
    }

    public function delete(DriverCarRelationRequest $request): void
    {
        $driverId = $request->getDriverId();
        $carId = $request->getCarId();

        $driver = $this->driverRepository->find($driverId);
        $car = $this->carRepository->find($carId);

        $car->removeDriver($driver);

        $this->em->flush();
    }
}
