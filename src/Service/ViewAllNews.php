<?php

namespace App\Service;
use App\Repository\NewsItemRepository;

class ViewAllNews
{
    private $newsRepository;

    public function __construct(NewsItemRepository $newsRepository)
        {
            $this->newsRepository = $newsRepository;
        }

    public function getAllNews()
        {
            return $this->newsRepository->findAll();
        }

}

