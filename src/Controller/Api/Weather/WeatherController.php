<?php

namespace App\Controller\Api\Weather;

use App\Weather\Service\WeatherServiceInterface;
use OpenApi\Annotations as OA;
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
     * Set city temperature for the selected date.
     *
     * @Route("/create", methods={"POST"})
     *
     * @OA\Post(
     *     tags={"weather"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                  @OA\Property(property="cityId",type="integer",example=1),
     *                  @OA\Property(property="date",type="string",example="2020-10-30 00:00:00"),
     *                  @OA\Property(property="temperature",type="float",example=25.7)
     *             )
     *         )
     *     ),
     *     @OA\Response(response="200", description="Ок")
     * )
     *
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

    /**
     * Get weekly statistics by city and period.
     *
     * Weekly statistics of the average temperature in the city for the selected period.
     *
     * @Route("/weekly-statistics", methods={"GET"})
     *
     * @OA\Get(
     *      tags={"weather"},
     *      @OA\Parameter(
     *          name="cityId",
     *          in="query",
     *          description="ID of the city",
     *          example=1,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Parameter(
     *          name="from",
     *          in="query",
     *          description="Start date of sampling statistics",
     *          example="2020-10-01 00:00:00",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="to",
     *          in="query",
     *          description="End date of sampling statistics",
     *          example="2020-10-30 23:59:59",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(response="200", description="Ок")
     * )
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function weeklyStatistics(Request $request): JsonResponse
    {
        $weather = $this->weatherService->weeklyStatistics(
            $request->query->get('cityId'),
            $request->query->get('from'),
            $request->query->get('to'),
        );

        return $this->json($weather);
    }

    /**
     * Get monthly statistics by city and period.
     *
     * Monthly statistics of the average temperature in the city for the selected period.
     *
     * @Route("/monthly-statistics", methods={"GET"})
     *
     * @OA\Get(
     *      tags={"weather"},
     *      @OA\Parameter(
     *          name="cityId",
     *          in="query",
     *          description="ID of the city",
     *          example=1,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Parameter(
     *          name="from",
     *          in="query",
     *          description="Start date of sampling statistics",
     *          example="2020-10-01 00:00:00",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="to",
     *          in="query",
     *          description="End date of sampling statistics",
     *          example="2020-10-30 23:59:59",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(response="200", description="Ок")
     * )
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function monthlyStatistics(Request $request): JsonResponse
    {
        $weather = $this->weatherService->monthlyStatistics(
            $request->query->get('cityId'),
            $request->query->get('from'),
            $request->query->get('to'),
        );

        return $this->json($weather);
    }
}
