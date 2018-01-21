<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\Response;
use App\Event\EmailRegistrationUserEvent;

class MailRegistrationUserListener
{
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function onMailRegistrationUserEvent(EmailRegistrationUserEvent $event)
    {
        $user = $event->getUser();
        $email = $event->getUser()->getEmail();
        $password = $event->getUser()->getPassword();
        $name = $event->getUser()->getName();

        $message = (new \Swift_Message('Registration User Successfully!'))
            ->setFrom($email)
            ->setTo($email)
            ->setBody('Registration User Successfully, Hello ' . $name)
            /*
            ->setBody(
                $this->renderView(
                    // app/Resources/views/Emails/changePassword.html.twig
                    'emails/changePassword.html.twig',
                    array('name' => $name)
                ),
                'text/html'
            )
            */
            /*
             * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'Emails/changePassword.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        ;

        $this->mailer->send($message);
    }
}
