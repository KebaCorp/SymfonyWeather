<?php

declare(strict_types=1);

namespace App\Weather\Model;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * Class Weather.
 *
 * @package App\Weather\Model
 * @ORM\Table(name="weather")
 * @ORM\Entity(repositoryClass="App\Weather\Repository\WeatherRepository")
 */
class Weather
{
    /**
     * ObjectId.
     *
     * @var int
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    protected int $id;

    /**
     * City ID.
     *
     * @var int
     * @ORM\Column(type="integer")
     */
    protected int $cityId;

    /**
     * Weather date.
     *
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    protected DateTime $date;

    /**
     * Temperature.
     *
     * @var float
     * @ORM\Column(type="float", length=255)
     */
    protected float $temperature;

    /**
     * Weather constructor.
     *
     * @param int    $cityId
     * @param string $date
     * @param float  $temperature
     *
     * @throws Exception
     */
    public function __construct(int $cityId, string $date, float $temperature)
    {
        $this->cityId = $cityId;
        $this->date = new DateTime($date);
        $this->temperature = $temperature;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getCityId(): int
    {
        return $this->cityId;
    }

    /**
     * @param int $cityId
     */
    public function setCityId(int $cityId): void
    {
        $this->cityId = $cityId;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return float
     */
    public function getTemperature(): float
    {
        return $this->temperature;
    }

    /**
     * @param float $temperature
     */
    public function setTemperature(float $temperature): void
    {
        $this->temperature = $temperature;
    }
}
