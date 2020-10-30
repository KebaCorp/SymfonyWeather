<?php

namespace App\Weather\Repository;

use App\Weather\Model\Weather;

/**
 * Interface WeatherRepositoryInterface.
 *
 * @package App\Weather\Repository
 */
interface WeatherRepositoryInterface
{
    /**
     * Get all Weathers.
     *
     * @return Weather[]
     */
    public function all(): array;

    /**
     * Get one Weather.
     *
     * @param int $id
     *
     * @return Weather
     */
    public function one(int $id): Weather;

    /**
     * Save Weather.
     *
     * @param Weather $weather
     *
     * @return Weather
     */
    public function save(Weather $weather): Weather;

    /**
     * Update Weather.
     *
     * @param Weather $weather
     *
     * @return Weather
     */
    public function update(Weather $weather): Weather;

    /**
     * Get weekly statistics by city and period.
     *
     * @param int    $cityId
     * @param string $from
     * @param string $to
     *
     * @return array
     */
    public function weeklyStatistics(int $cityId, string $from, string $to): array;

    /**
     * Get monthly statistics by city and period.
     *
     * @param int    $cityId
     * @param string $from
     * @param string $to
     *
     * @return array
     */
    public function monthlyStatistics(int $cityId, string $from, string $to): array;
}
