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
}
