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
}
