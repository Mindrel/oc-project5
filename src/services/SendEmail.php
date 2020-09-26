<?php

namespace Mich\Blog\src\services;

require "config.php"; // Identifiants du SMTP

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

class SendEmail
{
    private $errors = [];
    public $errorMessage = '';

    public function __construct() 
    {
        $this->email();    
    }

    public function email()
    {
        if (!empty($_POST)) {
            $name = $_POST['nom'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            if (empty($name)) {
                $this->errors[] = 'Name is empty';
            }

            if (empty($email)) {
                $this->errors[] = 'Email is empty';
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->errors[] = 'Email is invalid';
            }

            if (empty($message)) {
                $this->errors[] = 'Message is empty';
            }

            if (!empty($this->errors)) {
                $allErrors = join('<br/>', $this->errors);
                $this->errorMessage = "<p style='color: red;'>{$allErrors}</p>";
            } else {
                $mail = new PHPMailer(true);
                $mail->CharSet = 'UTF-8'; // Accents non pris en compte dans le nom expéditeur
                $mail->Encoding = 'quoted-printable'; // Accents non pris en compte dans le nom expéditeur
                // specify SMTP credentials
                $mail->isSMTP();
                $mail->Host = MAIL_HOST;
                $mail->SMTPAuth = true;
                $mail->Username = MAIL_USERNAME;
                $mail->Password = MAIL_PASSWORD;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom($email, 'Formulaire de contact P5');
                $mail->addAddress(MAIL_RECIPIENT, MAIL_RECIPIENT_NAME);
                $mail->Subject = 'Formulaire de contact P5 - Nouveau message de ' . html_entity_decode($name); // Accents non pris en compte dans le nom expéditeur

                // Enable HTML if needed
                $mail->isHTML(true);

                $bodyParagraphs = ["<strong>Nom expéditeur :</strong> {$name}", "<strong>Email réponse :</strong> {$email}", "<strong>Message posté :</strong>", nl2br($message)];
                $body = join('<br /><br />', $bodyParagraphs);
                $mail->Body = $body;

                echo $body;
                if ($mail->send()) {

                    header('Location: index.php'); // redirect to 'thank you' page
                } else {
                    $this->errorMessage = 'Oops, something went wrong. Mailer Error: ' . $mail->ErrorInfo;
                }
            }
        }
    }
}
