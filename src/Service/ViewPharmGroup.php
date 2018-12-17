<?php

namespace App\Service;
use App\Repository\PharmGroupRepository;

class ViewPharmGroup
{
    private $pharmRepository;

    public function __construct(PharmGroupRepository $pharmRepository)
        {
            $this->pharmRepository = $pharmRepository;
        }

    public function getAllPharm()
        {
            return $this->pharmRepository->findAll();
        }

}

