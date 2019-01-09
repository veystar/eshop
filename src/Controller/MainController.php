<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ViewAllNews;
use App\Service\ViewAllProducts;
use App\Repository\NewsItemRepository;
use App\Repository\ProductRepository;



class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(ProductRepository $productRepository, ViewAllProducts $productService)
    {
        $products = $productService->getAllProducts();
        return $this->render('main/index.html.twig', compact('products'));
    }

    /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('main/about.html.twig');
    }

    /**
     * @Route("/news", name="news")
     */
    public function news(NewsItemRepository $newsRepository, ViewAllNews $myService)
    {
        $news = $myService->getAllNews();
        return $this->render('main/news.html.twig', compact('news'));
    }

    /**
     * @Route("/order", name="order")
     */
    public function order()
    {
        return $this->render('main/order.html.twig');
    } 
    
}
