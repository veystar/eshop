<?php

namespace App\Controller;

use App\Entity\OrderItem;
use App\Entity\Orders;
use App\Service\CartManager;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Tests\Controller;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;
use App\Form\OrderType;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Form\OrderItemType;
use App\Repository\ProductRepository;

class OrderController extends AbstractController
{
    private $formFactory;
    private $entityManager;
    private $cartManager;
    private $session;
    

    const SESSION_CART_ID = 'cart';

    public function __construct(
        FormFactoryInterface $formFactory,
        EntityManagerInterface $entityManager,
        CartManager $cartManager,
        SessionInterface $session,
        ProductRepository $productRepository,
        \Swift_Mailer $mailer
    )
    {
        $this->formFactory = $formFactory;
        $this->entityManager = $entityManager;
        $this->cartManager = $cartManager;
        $this->session = $session;
        $this->productRepository = $productRepository;
        $this->mailer = $mailer;
    }
    /**
     * @Route("/order", name="order")
     */
    public function index(Request $request)
    {
        $adminEmail = 'yurii.sokoloff@gmail.com';
        $order = new Orders();
        $orderForm = $this->formFactory->create(OrderType::class, $order);
        $orderForm->handleRequest($request);

        if ($orderForm->isSubmitted() && $orderForm->isValid()) {
            $order = $orderForm->getData();
            if ($order instanceof Orders) {

                $this->entityManager->persist($order);
                $this->entityManager->flush();

                $session = $this->get('session');
                $cart = $session->get(self::SESSION_CART_ID);
                
                foreach ($cart as $id => $value) {
                    $orderItem = new OrderItem($this->productRepository->find($id)->getPrice(), $value, $id, $order);
                    $orderItemForm = $this->formFactory->create(OrderItemType::class, $orderItem);
                    $orderItemForm->handleRequest($request);
                    $orderItem = $orderItemForm->getData();
                    $this->entityManager->persist($orderItem);
                    $this->entityManager->flush();
                }
                /* -- send confirmation e-mail to buyer -- */
                $clientMessage = (new \Swift_Message('Ваш заказ оформлен'))
               ->setFrom($adminEmail)
               ->setTo($order->getEmail())
               ->setBody(
                   'Ваш заказ в магазине Nova успешно оформлен. Наш менеджер свяжется с Вами в ближайшее время.',
                   'text/plain');
                $this->mailer->send($clientMessage);

                /* -- send confirmation e-mail to admin -- */
                $adminMessage = (new \Swift_Message('Оформлен новый заказ'))
                ->setFrom($adminEmail)
                ->setTo($adminEmail)
                ->setBody(
                    'Оформлен новый заказ в магазине Nova.',
                    'text/plain');
                $this->mailer->send($adminMessage);

                $this->cartManager->emptyCart();


                $type = 'success';
                $message = 'Ваш заказ оформлен!';
            } else {
                $type = 'error';
                $message = 'К сожалению, Ваш заказ не может быть оформлен.';
            }

            $this->addFlash($type, $message);
            
        }
        return $this->redirectToRoute('cart');
    }
}
