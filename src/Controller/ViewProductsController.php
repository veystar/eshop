<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;

class ViewProductsController extends AbstractController
{
    /**
     * @Route("/view/{id}", name="view_products")
     */
    public function viewSingleProduct($id, ProductRepository $productRepository)
    {
        $product = $productRepository->find($id); //obtain product from repo
        
        return $this->render('view_products/single.html.twig', compact('product'));
    }

    /**
     * @Route("/category/{id}", name="view_category")
     */
    public function viewCategory()
    {
        return $this->render('view_products/index.html.twig', [
            'controller_name' => 'ViewProductsController',
        ]);
    }
}