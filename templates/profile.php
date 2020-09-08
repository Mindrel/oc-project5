<?php

// Vue profil utilisateur

$this->title = "Michel Martin - Gestion de votre profil";

?>

<!-- Hero secondaire -->
<div id="hero" class="hero-container-secondary"></div>

<section id="profile">
    <div class="container profile-section-container">
        <h3>Gestion de profil</h3>

        <!-- Séparateur sombre -->
        <div class="dark-divider">
            <div class="dark-divider-line"></div>
            <div class="dark-divider-icon"><i class="fas fa-code"></i></div>
            <div class="dark-divider-line"></div>
        </div>

        <?= $this->session->show("update_password") // Message apparaît après modif password ?>
        <?= $this->session->show("not_admin") // Apparaît si tentative d'action nécessitant d'être admin ?>

        <h4>Nom d'utilisateur : <?= $this->session->get("nickname") ?></h4>

        <a href="index.php?route=updatePassword" class="colored-submit-button">Modifier votre mot de passe</a>
        <a href="index.php?route=deleteAccount" class="light-link-button" onclick="return confirm('Voulez-vous vraiment supprimer votre compte ? \nATTENTION : Opération irréversible !')">Supprimer ce compte utilisateur</a>

        <a href="index.php?route=blog" class="text-link">Retour au blog</a>
    </div>
</section>