<?php

namespace App\Controller;
use App\Form\EmailFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class EmailController extends AbstractController
{
    /**
     * @Route("/contacts", name="contacts")
     */
    public function contacts(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(EmailFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();

            $message = (new \Swift_Message('You Got Mail From Website!'))
               ->setFrom($contactFormData['email'])
               ->setTo('skydome@yandex.ru')
               ->setBody(
                   $contactFormData['message'],
                   'text/plain'
               )
           ;

           $mailer->send($message);

           $this->addFlash('success', 'Таки Ваше сообщение отправлено!');

           return $this->redirectToRoute('contacts');
        }

        return $this->render('main/contacts.html.twig', [
            'our_form' => $form->createView(),
        ]);
    }
}
