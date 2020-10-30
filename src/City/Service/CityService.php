<?php

namespace App\City\Service;

use App\City\Model\City;
use App\City\Repository\CityRepositoryInterface;

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
     */
    public function all(): array
    {
        return $this->repository->all();
    }

    /**
     * {@inheritDoc}
     */
    public function create(string $name): City
    {
        $city = new City($name);
        $this->repository->save($city);

        return $city;
    }

    /**
     * {@inheritDoc}
     */
    public function update(int $id, string $name): City
    {
        $city = $this->repository->one($id);
        $city->setName($name);

        $this->repository->update($city);

        return $city;
    }

    /**
     * {@inheritDoc}
     */
    public function delete(int $id): bool
    {
        $city = $this->repository->one($id);
        $this->repository->delete($city);

        return true;
    }
}
