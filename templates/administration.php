<?php
// Vue hub central espace admin

$this->title = "Hub central espace administration"
?>

<section id="admin">
    <!-- Hero secondaire -->
    <div id="hero" class="hero-container-secondary">
        <h1>Administration</h1>

        <div class="white-divider">
            <div class="white-divider-line"></div>
            <div class="white-divider-icon"><i class="fas fa-code"></i></div>
            <div class="white-divider-line"></div>
        </div>
    </div>

    <!-- Hub d'accès à l'administration des projets, articles, commentaires, utilisateurs -->
    <div class="container admin-section-container">

        <div class="hub">
            <a href="index.php?route=adminProjects" class="admin-hub-button" title="Gestion des projets" ><i class="fas fa-code-branch"></i></a>
            <a href="index.php?route=adminArticles" class="admin-hub-button" title="Gestion des articles" class="admin-hub-button"><i class="far fa-newspaper"></i></a>
            <a href="index.php?route=adminComments" class="admin-hub-button" title="Gestion des commentaires" class="admin-hub-button"><i class="fas fa-comments"></i></a>
            <a href="index.php?route=adminUsers" class="admin-hub-button" title="Gestion des utilisateurs" class="admin-hub-button"><i class="fas fa-users"></i></a>
        </div>

        <div>
            <a href="index.php" class="text-link">Retour à l'accueil</a> | <a href="index.php?route=blog" class="text-link">Retour au blog</a>
        </div>

    </div>
</section>

<!-- Séparateur de sections -->
<div class="divider"></div>