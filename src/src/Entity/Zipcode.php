<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ZipcodeRepository")
 */
class Zipcode
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $zipcode;

    /**
     * @ORM\Column(type="integer")
     */
    private $locality;

    /**
     * @ORM\Column(type="integer")
     */
    private $subregion;

    /**
     * @ORM\Column(type="integer")
     */
    private $region;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BasicData", mappedBy="zipcode", orphanRemoval=true)
     */
    private $basicData;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(int $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getLocality(): ?int
    {
        return $this->locality;
    }

    public function setLocality(int $locality): self
    {
        $this->locality = $locality;

        return $this;
    }

    public function getSubregion(): ?int
    {
        return $this->subregion;
    }

    public function setSubregion(int $subregion): self
    {
        $this->subregion = $subregion;

        return $this;
    }

    public function getRegion(): ?int
    {
        return $this->region;
    }

    public function setRegion(int $region): self
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return Collection|BasicData[]
     */
    public function getBasicData(): Collection
    {
        return $this->basicData;
    }

    public function addBasicData(BasicData $basicData): self
    {
        if (!$this->basicData->contains($basicData)) {
            $this->basicData[] = $basicData;
            $basicData->setZipcode($this);
        }

        return $this;
    }

    public function removeBasicData(BasicData $basicData): self
    {
        if ($this->basicData->contains($basicData)) {
            $this->basicData->removeElement($basicData);
            // set the owning side to null (unless already changed)
            if ($basicData->getZipcode() === $this) {
                $basicData->setZipcode(null);
            }
        }

        return $this;
    }
}
