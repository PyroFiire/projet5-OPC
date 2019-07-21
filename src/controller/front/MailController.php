<?php

namespace Projet5\controller\front;
use \Swift_SmtpTransport;
use \Swift_Mailer;
use \Swift_Message;

class MailController{

    function sendmail($sujet,$emailexp,$emaildest,$replyto,$nomexp,$messexp){

        require('vendor/autoload.php');

        // Create the Transport
        $transport = (new Swift_SmtpTransport(EMAIL_SMTP, PORT))
          ->setUsername(EMAIL_ADDRESSE)
          ->setPassword(EMAIL_PASSWORD)
        ;

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message($sujet))
          ->setFrom([$emailexp => $nomexp]) // ce qui s'affiche dans entete mail 
          ->setTo($emaildest)
          ->setReplyTo($replyto, $nomexp)
          ->setBody($messexp,'text/html' // Mark the content-type as HTML
          );

        // Send the message
        $mailer->send($message);
    }

}

//EMAIL_SMTP = smtp.nomdedomaine.fr