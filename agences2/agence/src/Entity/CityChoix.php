<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CityChoixRepository")
 */
class CityChoix
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cities;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCities(): ?string
    {
        return $this->cities;
    }

    public function setCities(string $cities): self
    {
        $this->cities = $cities;

        return $this;
    }
}
