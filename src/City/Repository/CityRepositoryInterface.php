<?php

namespace App\City\Repository;

use App\City\Model\City;

/**
 * Interface CityRepositoryInterface.
 *
 * @package App\City\Repository
 */
interface CityRepositoryInterface
{
    /**
     * Get all Cities.
     *
     * @return City[]
     */
    public function all(): array;

    /**
     * Get one City.
     *
     * @param int $id
     *
     * @return City
     */
    public function one(int $id): City;

    /**
     * Save City.
     *
     * @param City $city
     *
     * @return City
     */
    public function save(City $city): City;

    /**
     * Update City.
     *
     * @param City $city
     *
     * @return City
     */
    public function update(City $city): City;
}
