<?php
//On inclut le fichier dont on a besoin (ici à la racine de notre site)
require 'Database.php';
//Ne pas oublier d'ajouter le fichier post.php
require 'post.php';
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
        $post = new post();
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
    </div>
</body>

</html>