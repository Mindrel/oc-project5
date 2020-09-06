<?php
// Vue d'un article

$this->title = "Article";
?>

<!-- Hero secondaire -->
<div id="hero" class="hero-container-secondary"></div>

<!-- Article -->
<section id="current-article">
    <div class="container current-article-section">

        <?= isset($errors["content"]) ? $errors["content"] : "" ?>

        <h2><?= htmlspecialchars($article->getTitle()) ?></h2>

        <div class="current-article-date">
            <p><?= ucfirst(htmlspecialchars($article->getCreationDate())) // ucfirst 1ère lettre majuscule 
                ?></p>
            <p>par <?= htmlspecialchars($article->getAuthor()) ?></p>
        </div>

        <p><?= nl2br(htmlspecialchars($article->getContent())) ?></p>

        <a href="#current-comments" class="text-link">Commenter l'article</a> | <a href="index.php?route=blog" class="text-link">Retour à la liste des articles</a>
    </div>
</section>

<!-- Commentaires -->
<section id="current-comments">
    <div class="container current-comments-section">
        <div class="comments-form-group">
            <h3>Commentaires</h3>

            <?= $this->session->show("add_comment") // Message apparaît si commentaire posté ?>
            <?= $this->session->show("flag_comment") // Message apparaît si commentaire signalé ?>

            <?php include("form_comment.php") ?>
        </div>

        <ul class="comments-list">

            <?php
            foreach ($comments as $comment) :
            ?>
                <li>
                    <h5><?= htmlspecialchars($comment->getNickname()) ?></strong></h5>
                    <p><?= htmlspecialchars($comment->getContent()) ?></p>
                    <p>Posté le
                        <?= htmlspecialchars($comment->getCreationDate()) ?>
                    </p>
                    <?php
                    if ($comment->isFlag()) :
                    ?>
                        <p>Ce commentaire a déjà été signalé</p>
                    <?php
                    else :
                    ?>
                        <p><a href="index.php?route=flagComment&commentId=<?= $comment->getId() ?>" class="text-link">Signaler le commentaire</a></p>
                    <?php
                    endif;
                    ?>
                </li>
            <?php
            endforeach;
            ?>
        
        </ul>
    </div>

    </div>
</section>