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
        return $this->render('cart/cart.html.twig', compact('basket'));
    }

    /**
     * @Route("/add-to-cart/{product}", name="add_to_cart")
     */
    public function add2(Product $product, Request $request, CartManager $cartService)
    {
        $cartService->add($product, $request->get('quantity'));
        return $this->redirectToRoute('cart');
    }

    /**
     * @Route("/remove-from-cart/{product}", name="remove_from_cart")
    */
    public function remove(Product $product, CartManager $cartService)
    {
        $cartService->remove($product);
        return $this->redirectToRoute('cart');
    }

    /**
     * @Route("/empty-cart/", name="empty_cart")
     */
    public function emptyCart(Request $request, CartManager $cartService)
    {
        $referer = $request->headers->get('referer');
        $cartService->emptyCart();
        return $this->redirect($referer); //'category');
    }
}
