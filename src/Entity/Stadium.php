<?php
namespace App\Entity;

/**
 * Class Stadium
 * @package App\Entity
 */
class Stadium
{
    /**
     * @var string
     */
    private string $country;

    /**
     * @var string
     */
    private string $city;

    /**
     * @var string
     */
    private string $name;

    /**
     * Player constructor.
     * @param string $name
     * @param string $country
     * @param string $city
     */
    public function __construct(string $country, string $city, string $name)
    {
        $this->country = $country;
        $this->city = $city;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}