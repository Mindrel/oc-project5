<?php

// Vue inscription utilisateur

$this->title  = "Michel Martin DWJ - Inscription";

?>

<!-- Hero secondaire -->
<div id="hero" class="hero-container-secondary"></div>


<section id="login">
    <div class="container login-register-section-container">
        <h3>Page d'inscription</h3>

        <!-- Séparateur sombre -->
        <div class="dark-divider">
            <div class="dark-divider-line"></div>
            <div class="dark-divider-icon"><i class="fas fa-code"></i></div>
            <div class="dark-divider-line"></div>
        </div>

        <?= isset($errors["nickname"]) ? $errors["nickname"] : "" ?>
        <?= isset($errors["pass"]) ? $errors["pass"] : "" ?>
    
        <!-- Formulaire d'inscription -->
        <form method="post" action="index.php?route=register">
            <div class="contact-input">
                <input type="text" id="nickname" name="nickname" placeholder="Pseudo" spellcheck="false" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pseudo'" value="<?= isset($post) ? htmlspecialchars($post->get("nickname")) : "" ?>" />
                <label for="nickname">Pseudo</label>
            </div>

            <div class="contact-input">
                <input type="password" id="pass" name="pass" placeholder="Mot de passe" spellcheck="false" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mot de passe'" />
                <i class="fas fa-eye" id="togglePassword"></i>
                <label for="pass">Mot de passe</label>
            </div>

            <input type="submit" value="Inscription" id="submit" name="submit" class="colored-submit-button" />
        </form>


        <a href="index.php" class="text-link">Retourner à l'accueil</a>
    </div>
</section>