<?php

namespace App\City\Repository;

use App\City\Model\City;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use RuntimeException;

/**
 * Class CityRepository.
 *
 * @package App\City\Repository
 */
class CityRepository extends ServiceEntityRepository implements CityRepositoryInterface
{
    /**
     * Entity manager.
     *
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $manager;

    /**
     * {@inheritDoc}
     */
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        $this->manager = $manager;
        parent::__construct($registry, City::class);
    }

    /**
     * {@inheritDoc}
     */
    public function all(): array
    {
        return parent::findAll();
    }

    /**
     * {@inheritDoc}
     */
    public function one(int $id): City
    {
        /** @var City $city */
        $city = parent::findOneBy(['id' => $id]);

        if ($city == null) {
            throw new RuntimeException("City {$id} not found");
        }

        return $city;
    }

    /**
     * {@inheritDoc}
     */
    public function save(City $city): City
    {
        $this->manager->persist($city);
        $this->manager->flush();

        return $city;
    }

    /**
     * {@inheritDoc}
     */
    public function update(City $city): City
    {
        $this->manager->flush();

        return $city;
    }

    /**
     * {@inheritDoc}
     */
    public function delete(City $city): bool
    {
        $this->manager->remove($city);
        $this->manager->flush();

        return true;
    }
}
