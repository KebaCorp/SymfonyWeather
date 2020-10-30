<?php

namespace App\Weather\Service;

use App\Weather\Model\Weather;
use App\Weather\Repository\WeatherRepositoryInterface;
use Exception;

/**
 * Class SecretService.
 *
 * @package App\Secrets\Service
 */
class WeatherService implements WeatherServiceInterface
{
    /**
     * Weather repository.
     *
     * @var WeatherRepositoryInterface
     */
    private WeatherRepositoryInterface $repository;

    /**
     * WeatherService constructor.
     *
     * @param WeatherRepositoryInterface $repository
     */
    public function __construct(WeatherRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * {@inheritDoc}
     * @throws Exception
     */
    public function create(string $cityId, string $date, float $temperature): Weather
    {
        $secret = new Weather($cityId, $date, $temperature);

        $this->repository->save($secret);

        return $secret;
    }
}
