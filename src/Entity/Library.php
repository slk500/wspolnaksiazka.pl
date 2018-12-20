<?php

declare(strict_types=1);

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="library")
 */
class Library
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $lat;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $lon;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $district;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $street;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $houseNumber;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $www;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getLat(): string
    {
        return $this->lat;
    }

    public function setLat(string $lat): void
    {
        $this->lat = $lat;
    }

    public function getLon(): string
    {
        return $this->lon;
    }

    public function setLon(string $lon): void
    {
        $this->lon = $lon;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getHouseNumber(): string
    {
        return $this->houseNumber;
    }

    public function setHouseNumber(string $houseNumber): void
    {
        $this->houseNumber = $houseNumber;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getWww(): string
    {
        return $this->www;
    }

    public function setWww(string $www): void
    {
        $this->www = $www;
    }

    public function getDistrict(): string
    {
        return $this->district;
    }

    public function setDistrict(string $district): void
    {
        $this->district = $district;
    }
}

