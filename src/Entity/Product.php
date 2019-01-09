<?php
namespace App\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @Vich\Uploadable
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
     * @ORM\Column(type="text", length=4096)
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

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }
}
