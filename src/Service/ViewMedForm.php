<?php

namespace App\Service;
use App\Repository\MedicinalFormRepository;

class ViewMedForm
{
    private $medRepository;

    public function __construct(MedicinalFormRepository $medRepository)
        {
            $this->medRepository = $medRepository;
        }

    public function getAllMedForms()
        {
            return $this->medRepository->findAll();
        }

}

