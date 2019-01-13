<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\ProductRepository;
use App\Entity\Product;

class CartManager
{
    const SESSION_CART_ID = 'cart';
    private $repository;
    private $session;

    public function __construct(ProductRepository $repository, SessionInterface $session)
    {
        $this->repository = $repository;
        $this->session = $session;
    }

    public function add(Product $product, int $quantity)
    {
        $cart = $this->session->get(self::SESSION_CART_ID);

        if ($this->session->has(self::SESSION_CART_ID) && isset($cart[$product->getId()])) {
            $cart[$product->getId()] += $quantity;
        } else {
            $cart[$product->getId()] = $quantity;
        }
        $this->session->set(self::SESSION_CART_ID, $cart);
    }

    public function getCart(): array
    {
        $res = [];


        if (!$this->session->has(self::SESSION_CART_ID) || empty($this->session->has(self::SESSION_CART_ID))) {
            return [];
        }

        foreach ($this->session->get(self::SESSION_CART_ID) as $productId => $quantity) {
            $position['quantity'] = $quantity;
            $position['product'] = $this->repository->find($productId);
            $res[] = $position;
        }

        return $res;
    }

    public function remove(Product $product)
    {
        $cart = $this->session->get(self::SESSION_CART_ID);
        if (array_key_exists($product->getId(), $cart)) { //$_SESSION['cart'])) {
            unset($cart[$product->getId()]);
            $this->session->set(self::SESSION_CART_ID, $cart);
        }
    }

    public function emptyCart()
    {
        $this->session->remove(self::SESSION_CART_ID);
    }

    public function change(Product $product, int $sign)
    {
        $cart = $this->session->get(self::SESSION_CART_ID);

        if ($this->session->has(self::SESSION_CART_ID) && isset($cart[$product->getId()]))
            {
                if ($sign == 1) {
                    $cart[$product->getId()] = $cart[$product->getId()] + 1;
                }
                elseif($sign == -1) {
                    $cart[$product->getId()] = $cart[$product->getId()] - 1;
                }
            $this->session->set(self::SESSION_CART_ID, $cart);
            }
        
        
    }

    public function getTotal()
    {
        $total = 0;
        $cart =  $this->getCart();
        if ($cart) {
            foreach ($cart as $value) {
                $total += $value['product']->getPrice() * $value['quantity'];
            }
        }
        return $total;
    }

    public function count()
    {
        $count = 0;
        $cart = $this->getCart();
        if ($cart) {
            foreach ($cart as $value) {
                $count += $value['quantity'];
            }
        }
        return $count;
    }

    
}