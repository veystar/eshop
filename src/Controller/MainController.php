<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('main/about.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/news", name="news")
     */
    public function news()
    {
        return $this->render('main/news.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/contacts", name="contacts")
     */
    public function contacts()
    {
        return $this->render('main/contacts.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/show/{id}", name="single_product")
     */
    public function product()
    {
        return $this->render('main/product.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/cart", name="cart")
     */
    public function basket()
    {
        return $this->render('main/cart.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/order", name="order")
     */
    public function order()
    {
        return $this->render('main/order.html.twig', [
            'controller_name' => 'MainController',
        ]);
    } 
    
}
