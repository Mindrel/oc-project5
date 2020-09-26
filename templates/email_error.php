<?php

// Vue erreur email

$this->title = "Michel Martin - Problème d'envoi";

// Redirection vers index.php après un délai de 6 secondes
header("Refresh: 6;URL=index.php#contact");

?>

<!-- Hero secondaire -->
<div id="hero" class="hero-container-secondary"></div>

<!-- Erreur lors de l'envoi du mail -->
<div class="container error-section-container">
    <p>
        <?= isset($errors["name"]) ? $errors["name"] : "" ?>
        <?= isset($errors["email"]) ? $errors["email"] : "" ?>
        <?= isset($errors["message"]) ? $errors["message"] : "" ?>
        <?= isset($errors["failure"]) ? $errors["failure"] : "" ?>
    </p>

    <p>
        <i>Veuillez réessayer !</i><br />
        Vous allez être automatiquement redirigé vers le formulaire de contact...
    </p>
</div>