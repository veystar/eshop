<?php

namespace App\Service;
use App\Repository\ProductRepository;

class ViewAllProducts
{
    private $productsRepository;

    public function __construct(ProductRepository $productsRepository)
        {
            $this->productsRepository = $productsRepository;
        }

    public function getAllProducts()
        {
            return $this->productsRepository->findAll();
        }

}

