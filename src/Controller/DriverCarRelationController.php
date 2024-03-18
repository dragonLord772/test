<?php

namespace App\Controller;

use App\Attribute\RequestBody;
use App\Model\DriverCarRelation\DriverCarRelationRequest;
use App\Service\DriverCarRelationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/api/v1')]
class DriverCarRelationController extends AbstractController
{
    public function __construct(private DriverCarRelationService $driverCarRelationService)
    {
    }

    #[Route(path: '/relation', methods: ['POST'])]
    public function store(#[RequestBody] DriverCarRelationRequest $request): Response
    {
        $this->driverCarRelationService->relation($request);

        return $this->json(null);
    }
    #[Route(path: '/relation', methods: ['DELETE'])]
    public function delete(#[RequestBody] DriverCarRelationRequest $request): Response
    {
        $this->driverCarRelationService->delete($request);

        return $this->json(null);
    }
}
