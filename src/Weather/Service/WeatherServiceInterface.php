<?php

namespace App\Weather\Service;

use App\Weather\Model\Weather;

/**
 * Interface WeatherServiceInterface.
 *
 * @package App\Weather\Service
 */
interface WeatherServiceInterface
{
    /**
     * Create Weather.
     *
     * @param int    $cityId
     * @param string $date
     * @param float  $temperature
     *
     * @return Weather
     */
    public function create(int $cityId, string $date, float $temperature): Weather;

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
