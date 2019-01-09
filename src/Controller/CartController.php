<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use App\Service\CartManager;

class CartController extends AbstractController
{
     /**
     * @Route("/cart", name="cart")
     */
    public function cartIndex(CartManager $cartService)
    {
        $basket = $cartService->getCart();
        dump($basket);
        //dump($cartService->getCart());
        //die;
        //return $this->render('cart/cart.html.twig', ['cart' => $cartService->getCart()]);
        return $this->render('cart/cart.html.twig', compact('basket'));
    }

    /**
     * @Route("/add-to-cart/{product}", name="add_to_cart")
     */
    public function add2(Product $product, Request $request, CartManager $cartService)
    {
        $cartService->add($product, $request->get('quantity'));
        //dump($cartService->getCart());
        //die;
        return $this->redirectToRoute('cart');
    }
}
