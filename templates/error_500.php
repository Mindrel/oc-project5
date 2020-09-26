<?php $this->title = "Michel Martin - Erreur 500" ?>

<!-- Hero secondaire -->
<div id="hero" class="hero-container-secondary"></div>

<div class="container error-section-container">
    <p>GROOOAAAAAAAAAAAAARRR !!! *</p>
    <?= $_SESSION["error"] ?>

    <img src="public/img/error-tiger.jpg" alt="Tigre pas content" />

    <p><i>* Oh non un problème serveur !...</i></p><br />

    <a href="index.php" class="text-link">Retour à la page d'accueil</a>
</div>