<?php
// Vue d'un article

$this->title = "Article";
?>

<!-- Hero secondaire -->
<div id="hero" class="hero-container-secondary"></div>

<!-- Article -->
<section id="current-article">
    <div class="container current-article-section">
        <?= isset($errors["nickname"]) ? $errors["nickname"] : "" ?>
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
            
            <?php
            if ($this->session->get("nickname")) : // Si connecté
                
                include("form_comment.php");

            else :
            ?>
            
            <p class="error-message"><i class="fas fa-exclamation-circle"></i>Vous devez être connecté pour pouvoir poster un commentaire</p>
            <a href="index.php?route=login" class="text-link">Se connecter</a> | <a href="index.php?route=register" class="text-link">S'inscrire</a>

            <?php
            endif;
            ?>

        </div>

        <ul class="comments-list">

            <?php
            foreach ($comments as $comment) :
            ?>
                <li>
                    <h5><?= htmlspecialchars($comment->getNickname()) ?></h5>
                    <p><?= htmlspecialchars($comment->getContent()) ?></p>
                    <p>Posté le <?= htmlspecialchars($comment->getCreationDate()) ?> 
                    
                    <?php
                    if ($this->session->get("nickname")) :
                    ?>

                        <?php
                        if ($comment->isFlag()) :
                        ?>
                            | <i>Ce commentaire a déjà été signalé</i></p>
                        <?php
                        else :
                        ?>
                            | <a href="index.php?route=flagComment&commentId=<?= $comment->getId() ?>" class="text-link" onclick="return confirm('Souhaitez-vous vraiment signaler ce commentaire ?')" >Signaler le commentaire</a></p>
                        <?php
                        endif;
                        ?>

                    <?php
                    else :
                    ?>

                    </p>

                    <?php
                    endif;
                    ?>
                </li>
            <?php
            endforeach;
            ?>
        
        </ul>
    </div>
</section>