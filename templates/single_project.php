<?php
// Vue d'un projet

$this->title = "Michel Martin - Projet : " . htmlspecialchars($project->getTitle());
?>

<!-- Hero secondaire -->
<div id="hero" class="hero-container-secondary"></div>

<!-- project -->
<section id="current-project">
    <div class="container current-project-section-container">
        <h2><?= htmlspecialchars($project->getTitle()) ?></h2>

        <!-- Contenu et illustration -->
        <p>
            <a href="<?= htmlspecialchars($project->getWebsite()) ?>" target="_blank" title="Nouvel onglet vers le site du projet" rel="nofollow"><img src="public/img/<?= htmlspecialchars($project->getImg()) ?>.jpg" alt="Aperçu - Illustration du projet" /></a>

            <?= nl2br(htmlspecialchars($project->getContent())) ?>
        </p>

        <!-- Liens -->
        <div><a href="<?= htmlspecialchars($project->getWebsite()) ?>" target="_blank" title="Nouvel onglet vers le site du projet" class="text-link" rel="nofollow">Visiter le site du projet</a> | <a href="index.php?route=projects" class="text-link">Retour à la liste des projets</a></div>
    </div>
</section>