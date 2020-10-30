<?php

namespace App\Controller\Api\City;

use App\City\Service\CityServiceInterface;
use OpenApi\Annotations as OA;
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
     * Get all Cities.
     *
     * @Route("/all", methods={"GET"})
     *
     * @OA\Get(
     *      tags={"city"}
     * )
     *
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        return $this->json($this->cityService->all());
    }

    /**
     * Create City.
     *
     * @Route("/create", methods={"POST"})
     *
     * @OA\Post(
     *     tags={"city"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                  @OA\Property(property="name",type="string",example="Moscow")
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

        return $this->json($this->cityService->create($data['name']));
    }

    /**
     * Update City.
     *
     * @Route("/update", methods={"POST"})
     *
     * @OA\Post(
     *     tags={"city"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                  @OA\Property(property="id",type="integer",example=1),
     *                  @OA\Property(property="name",type="string",example="Moscow's new name")
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
    public function update(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        return $this->json($this->cityService->update($data['id'], $data['name']));
    }

    /**
     * Delete City.
     *
     * @Route("/delete", methods={"POST"})
     *
     * @OA\Post(
     *     tags={"city"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                  @OA\Property(property="id",type="integer",example=1)
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
    public function delete(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        return $this->json($this->cityService->delete($data['id']));
    }
}
