<?php

namespace App\Controller;

use App\Attribute\RequestBody;
use App\Dto\Transformer\Car\CarTransformer;
use App\Entity\Car;
use App\Model\Car\CarCreateRequest;
use App\Model\Car\CarEditRequest;
use App\Repository\CarRepository;
use App\Service\CarService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/api/v1', name: 'car_')]
class CarController extends AbstractController
{
    public function __construct(private CarService $carService, private CarTransformer $transformer, private CarRepository $repository)
    {
    }

    #[Route(path: '/cars', name: 'index', methods: ['GET'])]
    public function index(): Response
    {
        $cars = $this->repository->findAllWithDrivers();
        $response = $this->transformer->transformFromObjects($cars);

        return $this->json($response);
    }

    #[Route(path: '/car', name: 'store', methods: ['POST'])]
    public function store(#[RequestBody] CarCreateRequest $carCreateRequest): Response
    {
        $car = $this->carService->carCreate($carCreateRequest);

        return $this->json($car);
    }

    #[Route(path: '/car/{id}', name: 'show', methods: ['GET'])]
    public function show(Car $car): Response
    {
        $response = $this->transformer->transformFromObject($car);

        return $this->json($response);
    }

    #[Route(path: '/car/{id}', name: 'update', methods: ['POST'])]
    public function update(Car $car, #[RequestBody] CarEditRequest $carEditRequest): Response
    {
        $this->carService->carEdit($car, $carEditRequest);

        return $this->json(true);
    }

    #[Route(path: '/car/{id}', name: 'delete', methods: ['DELETE'])]
    public function delete(Car $car): Response
    {
        $this->repository->remove($car);

        return $this->json(true);
    }
}
