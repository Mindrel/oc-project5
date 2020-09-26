<?php

// Vue erreur email

$this->title = "Michel Martin - Message envoyé";

// Redirection vers index.php après un délai de 6 secondes
header("Refresh: 6;URL=index.php");

?>

<!-- Hero secondaire -->
<div id="hero" class="hero-container-secondary"></div>

<!-- Erreur lors de l'envoi du mail -->
<div class="container email-message-section-container">
    <p class="email-message">Merci beaucoup pour votre message !</p>
    <p class="email-message">Vous recevrez une réponse rapidement.<br />
        À bientôt !
    </p><br />

    <p class="email-message">
        Redirection dans <b><span id="countdown"></span></b>
    </p>
</div>

<script src="public/js/countdown.js"></script>