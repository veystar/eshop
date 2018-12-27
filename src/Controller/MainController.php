<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ViewAllNews;
use App\Service\ViewAllProducts;
#use App\Service\ViewPharmGroup;
#use App\Service\ViewMedForm;
#use App\Service\ViewTargetAnimals;
use App\Repository\NewsItemRepository;
use App\Repository\ProductRepository;
#use App\Repository\PharmGroupRepository;
#use App\Repository\TargetAnimalsRepository;
#use App\Repository\MedicinalFormRepository;


class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    /*public function index(PharmGroupRepository $pharmRepository, ViewPharmGroup $pharmService, 
                            MedicinalFormRepository $medRepository, ViewMedForm $medService, 
                            TargetAnimalsRepository $animalRepository, ViewTargetAnimals $animalService)
    {
        $pharm = $pharmService->getAllPharm();
        $medForms = $medService->getAllMedForms();
        $animals = $animalService->getAllAnimals();
        return $this->render('main/index.html.twig', compact('pharm', 'medForms', 'animals'));
    } */

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
     * @Route("/cart", name="cart")
     */
    public function basket()
    {
        return $this->render('main/cart.html.twig');
    }

    /**
     * @Route("/order", name="order")
     */
    public function order()
    {
        return $this->render('main/order.html.twig');
    } 
    
}
