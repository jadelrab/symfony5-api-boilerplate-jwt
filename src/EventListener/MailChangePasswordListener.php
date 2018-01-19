<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\Response;
use App\Event\EmailChangePasswordEvent;

class MailChangePasswordListener
{
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function onMailChangePasswordEvent(EmailChangePasswordEvent $event)
    {
        $user = $event->getUser();
        $email = $event->getUser()->getEmail();
        $password = $event->getUser()->getPassword();

        $message = (new \Swift_Message('Change Password Success!'))
            ->setFrom($email)
            ->setTo($email)
            ->setBody('Change Password Success! This is your new password: ' . $password)
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
