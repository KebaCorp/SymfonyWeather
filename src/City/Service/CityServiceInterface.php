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
     * Create City.
     *
     * @param string $name
     *
     * @return City
     */
    public function create(string $name): City;
}
