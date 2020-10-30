<?php

namespace App\Controller\Api\City;

use App\City\Service\CityServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CityController.
 *
 * @package App\Controller\Api\City
 */
class CityController extends AbstractController
{
    /**
     * City service.
     *
     * @var CityServiceInterface
     */
    private CityServiceInterface $cityService;

    /**
     * CityController constructor.
     *
     * @param CityServiceInterface $cityService
     */
    public function __construct(CityServiceInterface $cityService)
    {
        $this->cityService = $cityService;
    }

    /**
     * Create City.
     *
     * @Route("/create", methods={"POST"})
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $city = $this->cityService->create($data['name']);

        return $this->json($city);
    }
}
