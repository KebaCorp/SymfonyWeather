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
     * @param string $cityId
     * @param string $date
     * @param float  $temperature
     *
     * @return Weather
     */
    public function create(string $cityId, string $date, float $temperature): Weather;
}
