<?php
// Vue du blog avec tous les articles

$this->title = "Michel Martin - Le blog"
?>

<!-- Hero secondaire -->
<div id="hero" class="hero-container-secondary"></div>

<section id="all-articles">
    <div class="container articles-section-container">
        <h3>Blog</h3>

        <!-- Séparateur sombre -->
        <div class="dark-divider">
            <div class="dark-divider-line"></div>
            <div class="dark-divider-icon"><i class="fas fa-code"></i></div>
            <div class="dark-divider-line"></div>
        </div>

        <?= $this->session->show("login"); // Message apparaît si utilisateur connecté ?>
        <?= $this->session->show("logout"); // Message apparaît si utilisateur se déconnecte ?>

        <!-- Date/auteur et contenu article -->
        <?php
        foreach ($articles as $article) :
        ?>
            <article>
                <div class="article-content">
                    <header>
                        <h4 class="article-title"><?= htmlspecialchars($article->getTitle()) ?></h4>
                    </header>

                    <section>
                        <p><?= nl2br(htmlspecialchars($article->getContent())) ?>...</p>
                    </section>

                    <!-- Accès à l'article -->
                    <p><a href="index.php?route=article&articleId=<?= htmlspecialchars($article->getId()) ?>" class="light-link-button">Lire la suite</a></p>
                </div>

                <footer class="article-date">
                    <time datetime="<?= htmlspecialchars($article->getTimeTag()) ?>"><?= ucfirst(htmlspecialchars($article->getCreationDate())) // ucfirst 1ère lettre majuscule ?></time>
                    <p>par <?= htmlspecialchars($article->getAuthor()) ?></p>
                </footer>
            </article>
        <?php
        endforeach;
        ?>

    </div>
</section>