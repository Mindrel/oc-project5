<?php

// Vue changement de mot de passe

$this->title = "Michel Martin - Modifier votre mot de passe";

?>
<!-- Hero secondaire -->
<div id="hero" class="hero-container-secondary"></div>

<section id="profile">
    <div class="container login-register-section-container">
        <p class="password-indication">Cher <?= $this->session->get("nickname") ?>, veuillez saisir votre nouveau mot de passe :</p>

        <form method="post" action="index.php?route=updatePassword">
            <div class="contact-input">
                <input type="password" id="pass" name="pass" placeholder="Mot de passe" spellcheck="false" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mot de passe'"/>
                <i class="fas fa-eye" id="togglePassword"></i>
                <label for="pass">Mot de passe</label>
            </div>

            <div>
                <input type="submit" value="Mettre à jour" id="submit" name="submit" class="colored-submit-button" onclick="return confirm('Confirmez-vous votre nouveau mot de passe ?')" />
            </div>
        </form>

        <a href="index.php?route=profile" class="text-link">Revenir sur votre profil</a>
    </div>
</section>

<script src="public/js/toggle_pass.js"></script> <!-- Affiche/Masque le mot de passe -->