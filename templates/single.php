<?php

// On appelle l'autoloader pour éviter la répétitions des require
require '../vendor/autoload.php';

use Mich\Blog\src\DAO\PostDAO; // use le namespace nécessaire sans quoi l'objet PostDAO sera introuvable lors de l'instanciation (mieux que NEW \mich\Blog\src\DAO\PostDAO car évite la répétition)
use Mich\Blog\src\DAO\CommentDAO; // idem

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Mon blog</title>
</head>

<body>
    <div>
        <h1>Mon blog</h1>
        <p>En construction</p>
        <?php
        $post = new PostDAO();
        $posts = $post->getpost($_GET["postId"]);
        $post = $posts->fetch()
        ?>
        <div>
            <h2><?= htmlspecialchars($post->title); ?></h2>
            <p><?= htmlspecialchars($post->content); ?></p>
            <p><?= htmlspecialchars($post->author); ?></p>
            <p>Créé le : <?= htmlspecialchars($post->creation_date); ?></p>
        </div>
        <br>
        <?php
        $posts->closeCursor();
        ?>
        <a href="home.php">Retour à l'accueil</a>

        <div id="comments" class="text-left" style="margin-left: 50px">
            <h3>Commentaires</h3>
            <?php
            $comment = new CommentDAO();
            $comments = $comment->getCommentsFromPost($_GET["postId"]);
            while ($comment = $comments->fetch()) {
            ?>
                <h4><?= htmlspecialchars($comment->nickname); ?></h4>
                <p><?= htmlspecialchars($comment->content); ?></p>
                <p>Posté le
                    <?= htmlspecialchars($comment->creation_date); ?>
                </p>
            <?php
            }

            $comments->closeCursor();
            ?>

        </div>
    </div>
</body>

</html>