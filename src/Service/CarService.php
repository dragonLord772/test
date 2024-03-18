<?php

namespace App\Service;

use App\Entity\Car;
use App\Model\Car\CarCreateRequest;
use App\Model\Car\CarEditRequest;
use Doctrine\ORM\EntityManagerInterface;

class CarService
{
    public function __construct(private EntityManagerInterface $em)
    {
    }


    public function carCreate(CarCreateRequest $request): Car
    {
        $car = (new Car())
            ->setBrand($request->getBrand())
            ->setLicensePlate($request->getLicensePlate())
            ->setColor($request->getColor());

        $this->em->persist($car);
        $this->em->flush();

        return $car;
    }

    public function carEdit($car, CarEditRequest $request): void
    {
        $car
            ->setBrand($request->getBrand())
            ->setLicensePlate($request->getLicensePlate())
            ->setColor($request->getColor());

        $this->em->flush();
    }
}
