<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;



class MailService
{

    public function sendEmail(
        $email,
        $message,
        MailerInterface $mailerInterface )
    {
        $email = (new Email())
        ->from("grfds@gmail.com")
        ->to($email)
        //->cc('cc@example.com')
        //->bcc('bcc@example.com')
        //->replyTo('fabien@example.com')
        //->priority(Email::PRIORITY_HIGH)
        ->subject('Time for Symfony Mailer!')
        ->text($message)
        ->html($message);

    $mailer->send($email);
    ;
    }
}
