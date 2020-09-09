<?php
// Vue du blog avec tous les projects

$this->title = "Michel Martin - Liste des projets"
?>

<!-- Hero secondaire -->
<div id="hero" class="hero-container-secondary"></div>

<section id="all-projects">
    <div class="container projects-section-container">
        <h3>Tous mes projets</h3>

        <!-- Séparateur sombre -->
        <div class="dark-divider">
            <div class="dark-divider-line"></div>
            <div class="dark-divider-icon"><i class="fas fa-code"></i></div>
            <div class="dark-divider-line"></div>
        </div>

        <!-- Logo, contenu, lien vers le project -->
        <?php
        foreach ($projects as $project) :
        ?>
            <article>
                <header>
                    <img src="public/img/<?= htmlspecialchars($project->getLogo()) ?>.jpg" alt="logo projet" />
                </header>

                <div class="project-content">
                    <section>
                        <h4 class="project-title"><?= htmlspecialchars($project->getTitle()) ?></h4>
                        <p><?= htmlspecialchars($project->getContent()) ?>...</p>
                    </section>

                    <!-- Accès au projet -->
                    <footer>
                        <p><a href="index.php?route=project&projectId=<?= htmlspecialchars($project->getId()) ?>" class="light-link-button">Lire le détail</a></p>
                    </footer>
                </div>
            </article>
        <?php
        endforeach;
        ?>

    </div>
</section>