<?php

// Requiert les fichiers nécessaire au fonctionnement de cette page
require '../src/DAO/DAO.php';
require "../src/DAO/PostDAO.php";

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
                <h2><a href="single.php?postId=<?= htmlspecialchars($post->id); ?>"><?= htmlspecialchars($post->title); ?></a></h2>
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