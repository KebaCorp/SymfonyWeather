<?php

declare(strict_types=1);

namespace App\City\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class City.
 *
 * @package App\City\Model
 * @ORM\Table(name="city")
 * @ORM\Entity(repositoryClass="App\City\Repository\CityRepository")
 */
class City
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
     * City name.
     *
     * @var string
     * @ORM\Column(type="string")
     */
    protected string $name;

    /**
     * City constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
