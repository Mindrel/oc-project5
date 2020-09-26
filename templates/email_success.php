<?php

// Vue erreur email

$this->title = "Michel Martin - Message envoyé";

// Redirection vers index.php après un délai de 5 secondes
header("Refresh: 4;URL=index.php");

?>

<!-- Hero secondaire -->
<div id="hero" class="hero-container-secondary"></div>

<!-- Erreur lors de l'envoi du mail -->
<div class="container success-section-container">
    <p>
        Merci beaucoup pour votre message !<br />
        Vous recevrez une réponse rapidement. <br />
        À bientôt !
    </p>

    <p>
        Vous allez être automatiquement redirigé vers le formulaire de contact...
    </p>
</div>