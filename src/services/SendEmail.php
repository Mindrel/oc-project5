<?php

namespace Mich\Blog\src\services;

require "config.php"; // Identifiants du SMTP

use PHPMailer\PHPMailer\PHPMailer;

class SendEmail
{
    private $name;
    private $email;
    private $message;
    public $errors;

    public function __construct()
    {
        $this->name = isset($_POST['nom']) ? $_POST['nom'] : null;
        $this->email = isset($_POST['email']) ? $_POST['email'] : null;
        $this->message = isset($_POST['message']) ? $_POST['message'] : null;
        $this->errors = [];
        $this->checkErrorsEmail();
    }

    // Validation du form contact
    public function checkErrorsEmail()
    {
        if (empty($this->name) || $this->name == null) {
            $this->errors["name"] = '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Le champ nom est vide</p>';
        }

        if (empty($this->email) || $this->email == null) {
            $this->errors["email"] = '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Le champ email est vide</p>';
        } else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errors["email"] = '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Le format d\'adresse email n\'est pas valide</p>';
        }

        if (empty($this->message) || $this->message == null) {
            $this->errors["message"] = '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Le champ message est vide</p>';
        } else {
            $this->generateEmail();
        }
    }

    // Création de l'email (si check OK)
    public function generateEmail()
    {
        $mail = new PHPMailer();

        // Accents non pris en compte dans le nom expéditeur
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'quoted-printable';

        // Param SMTP et email (CONST dans config.php)
        $mail->isSMTP();
        $mail->Host = MAIL_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = MAIL_USERNAME;
        $mail->Password = MAIL_PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->setFrom(MAIL_SET_FROM, 'Formulaire de contact P5');
        $mail->addAddress(MAIL_RECIPIENT, MAIL_RECIPIENT_NAME);
        $mail->Subject = 'Nouveau message de ' . html_entity_decode($this->name); // Accents non pris en compte dans le nom expéditeur

        // Activation HTML nécessaire (mise en forme texte)
        $mail->isHTML(true);

        // Contenu du mail
        $bodyParagraphs = ["<strong>Nom expéditeur :</strong> {$this->name}", "<strong>Email réponse :</strong> {$this->email}", "<strong>Message posté :</strong>", nl2br($this->message)];
        $body = join('<br /><br />', $bodyParagraphs);
        $mail->Body = $body;

        // Envoi du mail, si échoue :
        if (!$mail->send()) {
            $this->error["failure"] = '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Oups, il semble que l\'envoi du message ait échoué... ' /* '<br />Détail de l'erreur :<br />' . $mail->ErrorInfo */ . '</p>';
        }
    }
}
