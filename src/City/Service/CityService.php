<?php

namespace App\City\Service;

use App\City\Model\City;
use App\City\Repository\CityRepositoryInterface;
use Exception;

/**
 * Class SecretService.
 *
 * @package App\Secrets\Service
 */
class CityService implements CityServiceInterface
{
    /**
     * City repository.
     *
     * @var CityRepositoryInterface
     */
    private CityRepositoryInterface $repository;

    /**
     * CityService constructor.
     *
     * @param CityRepositoryInterface $repository
     */
    public function __construct(CityRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * {@inheritDoc}
     * @throws Exception
     */
    public function create(string $name): City
    {
        $city = new City($name);

        $this->repository->save($city);

        return $city;
    }
}
