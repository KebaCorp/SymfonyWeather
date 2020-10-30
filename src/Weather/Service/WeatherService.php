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
    public function create(int $cityId, string $date, float $temperature): Weather
    {
        $weather = new Weather($cityId, $date, $temperature);

        $this->repository->save($weather);

        return $weather;
    }

    /**
     * {@inheritDoc}
     */
    public function weeklyStatistics(int $cityId, string $from, string $to): array
    {
        return $this->repository->weeklyStatistics($cityId, $from, $to);
    }

    /**
     * {@inheritDoc}
     */
    public function monthlyStatistics(int $cityId, string $from, string $to): array
    {
        return $this->repository->monthlyStatistics($cityId, $from, $to);
    }
}
