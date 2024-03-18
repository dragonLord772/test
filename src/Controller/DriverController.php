<?php

namespace App\Controller;

use App\Attribute\RequestBody;
use App\Dto\Transformer\Driver\DriverTransformer;
use App\Entity\Driver;
use App\Model\Driver\DriverRequest;
use App\Repository\DriverRepository;
use App\Service\DriverService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/api/v1', name: 'driver_')]
class DriverController extends AbstractController
{
    public function __construct(private DriverService $driverService, private DriverTransformer $transformer, private DriverRepository $repository)
    {
    }

    #[Route(path: '/drivers', methods: ['GET'])]
    public function index(): Response
    {
        $cars = $this->repository->findAll();
        $response = $this->transformer->transformFromObjects($cars);

        return $this->json($response);
    }

    #[Route(path: '/driver', methods: ['POST'])]
    public function store(#[RequestBody] DriverRequest $request): Response
    {
        $car = $this->driverService->driverCreate($request);

        return $this->json($car);
    }

    #[Route(path: '/driver/{id}', methods: ['GET'])]
    public function show(Driver $driver, DriverRepository $driverRepository): Response
    {
        $response = $this->transformer->transformFromObject($driver);

        return $this->json($response);
    }

    #[Route(path: '/driver/{id}', methods: ['POST'])]
    public function update(Driver $driver, #[RequestBody] DriverRequest $request): Response
    {
        $this->driverService->driverEdit($driver, $request);

        return $this->json($driver);
    }

    #[Route(path: '/driver/{id}', methods: ['DELETE'])]
    public function delete(Driver $driver, DriverRepository $driverRepository): Response
    {
        $this->repository->remove($driver);

        return $this->json(true);
    }
}
