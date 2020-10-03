<?php
// Vue du blog avec tous les projects

use Mich\Blog\src\DAO\ProjectDAO;
use const Mich\Blog\src\controller\ITEM_PER_PAGE;

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
                    <img src="<?= htmlspecialchars($project->getLogo()) ?>" alt="logo projet" />
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

        <!-- Pagination des projets -->

        <?php
        $this->projectDAO = new ProjectDAO();
        $nbProjects = $this->projectDAO->countProjects();
        $nbPages = ceil($nbProjects / ITEM_PER_PAGE);
        $currentPage = $_GET['page'];
        ?>

        <ul class="projects-pagination">
            <!-- Vers page précédente (disparaît sur la première page) -->
            <li class="project-page <?= ($currentPage == 1) ? "project-page-disabled" : "" ?>">
                <a href="index.php?route=projects&page=<?= $currentPage - 1 ?>" class="project-page-link"><i class="fas fa-chevron-left"></i> Plus récents</a>
            </li>

            <!-- Numéros de pages (lien du num de la page courante désactivé) -->
            <?php
            for ($page = 1; $page <= $nbPages; $page++) :
            ?>
                <li class="project-page <?= ($currentPage == $page) ? "project-current-page" : "" ?>">
                    <?php
                    if ($currentPage == $page) :
                        echo $page;
                    else :
                        echo '<a href="index.php?route=projects&page=' . $page . '" class="project-page-link">' . $page . '</a>';
                    endif;
                    ?>
                </li>
            <?php
            endfor;
            ?>

            <!-- Vers page suivante (disparaît sur la dernière page) -->
            <li class="project-page <?= ($currentPage == $nbPages) ? "project-page-disabled" : "" ?>">
                <a href="index.php?route=projects&page=<?= $currentPage + 1 ?>" class="project-page-link">Plus anciens <i class="fas fa-chevron-right"></i></a>
            </li>
        </ul>
    </div>
</section>