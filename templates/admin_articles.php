<?php
// Vue backend gestion des articles

$this->title = "Administration - Gestion des articles"
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

    <div class="container admin-section-container">

        <h3>Gestion des articles</h3>

        <?= $this->session->show("add_article") // Affiche message lors de l'ajout article ?>
        <?= $this->session->show("edit_article") // Affiche message lors de la modif article ?>
        <?= $this->session->show("delete_article") // Affiche message lors de la suppression article ?>

        <a href="index.php?route=addArticle" class="text-link">Créer un nouvel article <i class="fas fa-plus-circle"></i></a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Auteur</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($articles as $article) :
                ?>
                    <tr>
                        <td class="id-cell"><?= htmlspecialchars($article->getId()) ?></td>
                        <td class="title-cell"><a href="index.php?route=article&articleId=<?= htmlspecialchars($article->getId()) ?>" class="text-link" title="Accéder dans un nouvel onglet" target="_blank"><?= substr(htmlspecialchars($article->getTitle()), 0, 20) ?>...</a></td>
                        <td class="content-cell"><?= substr(htmlspecialchars($article->getContent()), 0, 80) // retourne les 80 premiers char 
                            ?>...</td>
                        <td class="author-cell"><?= htmlspecialchars($article->getAuthor()) ?></td>
                        <td class="date-cell"><?= htmlspecialchars($article->getTimeTag()) ?></td>
                        <td class="actions-cell">
                            <a href="index.php?route=editArticle&articleId=<?= $article->getId() ?>" title="Modifier"><i class="fas fa-pencil-alt"></i></a>
                            <a href="index.php?route=deleteArticle&articleId=<?= $article->getId() ?>" title="Supprimer" onclick="return confirm('Confirmer la suppression ?\n ATTENTION : Opération irréversible')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>

        <div>
            <a href="index.php?route=administration" class="text-link">Retour au hub admin</a> | <a href="index.php" class="text-link">Retour à l'accueil</a> | <a href="index.php?route=blog" class="text-link">Retour au blog</a>
        </div>
    </div>
</section>