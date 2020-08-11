<?php

use Mich\Blog\src\DAO\PostDAO; // use le namespace nécessaire sans quoi l'objet PostDAO sera introuvable lors de l'instanciation (mieux que NEW \mich\Blog\src\DAO\PostDAO car évite la répétition)

?>
<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>PROJET 5</title>
</head>

<body>
    <div>
        <h1>PROJET 5</h1>
        <p>En construction</p>
        <?php
        // On affiche tous les posts
        $post = new PostDAO();
        $posts = $post->getPosts();

        while ($post = $posts->fetch()) {
        ?>
            <div>
                <h2><a href="../public/index.php?route=post&postId=<?= htmlspecialchars($post->id); ?>"><?= htmlspecialchars($post->title); ?></a></h2>
                <p><?= htmlspecialchars($post->content); ?></p>
                <p><?= htmlspecialchars($post->author); ?></p>
                <p>Créé le : <?= htmlspecialchars($post->creation_date); ?></p>
            </div>
            <br />
        <?php
        }

        $posts->closeCursor();
        ?>
    </div>
</body>

</html>