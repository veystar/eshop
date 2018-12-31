<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use App\Repository\TargetAnimalsRepository;

class ViewAnimalsCategoryExtension extends AbstractExtension
{
    private  $animalRepository;

    public function __construct(TargetAnimalsRepository $animalsRepo)
        {
            $this->animalRepository = $animalsRepo;
        }

    public function getFunctions()
    {
        return array(
            new TwigFunction('showAnimals', array($this, 'showAnimalCategories')),
        );
    }

    public function showAnimalCategories()
    {
        $animals = $this->animalRepository->findAll();
        return $animals;
    }
}