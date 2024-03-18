<?php

namespace App\Controller;

use App\Attribute\RequestBody;
use App\Dto\Transformer\FinanceHistory\FinanceHistoryTransformer;
use App\Model\Finance\FinanceRequest;
use App\Repository\FinanceHistoryRepository;
use App\Service\FinanceDriverService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/api/v1', name: 'finance_')]
class FinanceDriverController extends AbstractController
{
    public function __construct(private FinanceDriverService $service, private FinanceHistoryTransformer $transformer, private FinanceHistoryRepository $repository)
    {
    }

    #[Route(path: '/finance/{id}', methods: ['GET'])]
    public function show(#[RequestBody] FinanceRequest $request): Response
    {
        $financeHistory = $this->repository->findBy(['driverId' => $request->getDriverId()]);

        $response = $this->transformer->transformFromObjects($financeHistory);

        return $this->json($response);
    }

    #[Route(path: '/finance', methods: ['POST'])]
    public function store(#[RequestBody] FinanceRequest $request): Response
    {
        $this->service->financeCreate($request);

        return $this->json(true);
    }
}
