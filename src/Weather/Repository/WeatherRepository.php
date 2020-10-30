<?php

namespace App\Weather\Repository;

use App\Weather\Model\Weather;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use RuntimeException;

/**
 * Class WeatherRepository.
 *
 * @package App\Weather\Repository
 */
class WeatherRepository extends ServiceEntityRepository implements WeatherRepositoryInterface
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
        parent::__construct($registry, Weather::class);
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
    public function one(int $id): Weather
    {
        /** @var Weather $weather */
        $weather = parent::findOneBy(['id' => $id]);

        if ($weather == null) {
            throw new RuntimeException("Weather {$id} not found");
        }

        return $weather;
    }

    /**
     * {@inheritDoc}
     */
    public function save(Weather $weather): Weather
    {
        $this->manager->persist($weather);
        $this->manager->flush();

        return $weather;
    }

    /**
     * {@inheritDoc}
     */
    public function update(Weather $weather): Weather
    {
        $this->manager->flush();

        return $weather;
    }

    /**
     * {@inheritDoc}
     */
    public function weeklyStatistics(int $cityId, string $from, string $to): array
    {
        $queryString = <<<PG
            SELECT avg(w.temperature) AS avgTemperature,
                date_trunc('week', w.date) AS weekFirstDay
            FROM Weather:Weather w
            WHERE w.cityId = :cityId
            AND w.date BETWEEN :from AND :to
            GROUP BY weekFirstDay
        PG;

        return $this->manager
            ->createQuery($queryString)
            ->setParameter('cityId', $cityId)
            ->setParameter('from', $from)
            ->setParameter('to', $to)
            ->getResult();
    }

    /**
     * {@inheritDoc}
     */
    public function monthlyStatistics(int $cityId, string $from, string $to): array
    {
        $queryString = <<<PG
            SELECT avg(w.temperature) AS avgTemperature,
                date_trunc('month', w.date) AS monthFirstDay
            FROM Weather:Weather w
            WHERE w.cityId = :cityId
            AND w.date BETWEEN :from AND :to
            GROUP BY monthFirstDay
        PG;

        return $this->manager
            ->createQuery($queryString)
            ->setParameter('cityId', $cityId)
            ->setParameter('from', $from)
            ->setParameter('to', $to)
            ->getResult();
    }
}
