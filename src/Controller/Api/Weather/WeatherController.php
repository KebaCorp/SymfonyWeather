<?php

namespace App\Controller\Api\Weather;

use App\Weather\Service\WeatherServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class WeatherController.
 *
 * @package App\Controller\Api\Weather
 */
class WeatherController extends AbstractController
{
    /**
     * Weather service.
     *
     * @var WeatherServiceInterface
     */
    private WeatherServiceInterface $weatherService;

    /**
     * WeatherController constructor.
     *
     * @param WeatherServiceInterface $weatherService
     */
    public function __construct(WeatherServiceInterface $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * Create Weather.
     *
     * @Route("/create", methods={"POST"})
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $weather = $this->weatherService->create($data['cityId'], $data['date'], $data['temperature']);

        return $this->json($weather);
    }
}
