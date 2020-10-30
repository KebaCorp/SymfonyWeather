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
     * @var string
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    protected string $id;

    /**
     * City ID.
     *
     * @var string
     * @ORM\Column(type="integer")
     */
    protected string $cityId;

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
     * @param string $cityId
     * @param string $date
     * @param float  $temperature
     *
     * @throws Exception
     */
    public function __construct(string $cityId, string $date, float $temperature)
    {
        $this->cityId = $cityId;
        $this->date = new DateTime($date);
        $this->temperature = $temperature;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCityId(): string
    {
        return $this->cityId;
    }

    /**
     * @param string $cityId
     */
    public function setCityId(string $cityId): void
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
