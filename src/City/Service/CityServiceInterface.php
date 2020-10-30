<?php

namespace App\City\Service;

use App\City\Model\City;

/**
 * Interface CityServiceInterface.
 *
 * @package App\City\Service
 */
interface CityServiceInterface
{
    /**
     * Get all Cities.
     *
     * @return City[]
     */
    public function all(): array;

    /**
     * Create City.
     *
     * @param string $name
     *
     * @return City
     */
    public function create(string $name): City;

    /**
     * Update City.
     *
     * @param int    $id
     * @param string $name
     *
     * @return City
     */
    public function update(int $id, string $name): City;

    /**
     * Delete City.
     *
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id): bool;
}
