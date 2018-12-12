<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Manufacturer;

    /**
     * @ORM\Column(type="text", length=512)
     */
    private $Brief;

    /**
     * @ORM\Column(type="float")
     */
    private $Price;

    /**
     * @ORM\Column(type="boolean")
     */
    private $TopSale;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PharmGroup", inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $PharmGroup;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MedicinalForm", inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $MedicinalForm;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TargetAnimals", inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $TargetAnimals;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getManufacturer(): ?string
    {
        return $this->Manufacturer;
    }

    public function setManufacturer(string $Manufacturer): self
    {
        $this->Manufacturer = $Manufacturer;

        return $this;
    }

    public function getBrief(): ?string
    {
        return $this->Brief;
    }

    public function setBrief(string $Brief): self
    {
        $this->Brief = $Brief;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(float $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getTopSale(): ?bool
    {
        return $this->TopSale;
    }

    public function setTopSale(bool $TopSale): self
    {
        $this->TopSale = $TopSale;

        return $this;
    }

    public function getPharmGroup(): ?PharmGroup
    {
        return $this->PharmGroup;
    }

    public function setPharmGroup(?PharmGroup $PharmGroup): self
    {
        $this->PharmGroup = $PharmGroup;

        return $this;
    }

    public function getMedicinalForm(): ?MedicinalForm
    {
        return $this->MedicinalForm;
    }

    public function setMedicinalForm(?MedicinalForm $MedicinalForm): self
    {
        $this->MedicinalForm = $MedicinalForm;

        return $this;
    }

    public function getTargetAnimals(): ?TargetAnimals
    {
        return $this->TargetAnimals;
    }

    public function setTargetAnimals(?TargetAnimals $TargetAnimals): self
    {
        $this->TargetAnimals = $TargetAnimals;

        return $this;
    }
}
