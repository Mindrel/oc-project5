<?php

// Vue connexion

$this->title  = "Michel Martin DWJ - Connexion";

?>

<!-- Hero secondaire -->
<div id="hero" class="hero-container-secondary"></div>


<section id="login">
    <div class="container login-register-section-container">
        <h3>Page de connexion</h3>

        <!-- Séparateur sombre -->
        <div class="dark-divider">
            <div class="dark-divider-line"></div>
            <div class="dark-divider-icon"><i class="fas fa-code"></i></div>
            <div class="dark-divider-line"></div>
        </div>

        <?= $this->session->show("need_login") // Apparaît si tentative d'action nécessitant d'être connecté ?>
        <?= $this->session->show("error_login") // Message si erreur login ou password ?>
        <?= $this->session->show("register"); // Message apparaît si nouvel utilisateur inscrit ?>

        <!-- Formulaire de connexion -->
        <form method="post" action="index.php?route=login">
            <div class="contact-input">
                <input type="text" id="nickname" name="nickname" placeholder="Pseudo" spellcheck="false" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pseudo'" value="<?= isset($post) ? htmlspecialchars($post->get("nickname")) : "" ?>" />
                <label for="nickname">Pseudo</label>
            </div>

            <div class="contact-input">
                <input type="password" id="pass" name="pass" placeholder="Mot de passe" spellcheck="false" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mot de passe'" />
                <i class="fas fa-eye" id="togglePassword"></i>
                <label for="pass">Mot de passe</label>
            </div>

            <div>
                <input type="submit" value="Connexion" id="submit" name="submit" class="colored-submit-button" />
            </div>        
        </form>

        <a href="index.php?route=blog" class="text-link">Retour au blog</a>
    </div>
</section>

<script src="public/js/toggle_pass.js"></script> <!-- Affiche/Masque le mot de passe -->
