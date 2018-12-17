<?php

namespace App\Service;
use App\Repository\TargetAnimalsRepository;

class ViewTargetAnimals
{
    private $animalRepository;

    public function __construct(TargetAnimalsRepository $animalRepository)
        {
            $this->animalRepository = $animalRepository;
        }

    public function getAllAnimals()
        {
            return $this->animalRepository->findAll();
        }

}

