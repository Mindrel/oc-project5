<?php

// Vue espace admin

$this->title = "Administration"

?>

<h1>Mon blog</h1>

<p>En construction</p>

<?= $this->session->show("add_article") // Affiche message lors de l'ajout article ?> 
<?= $this->session->show("edit_article") // Affiche message lors de la modif article ?>
<?= $this->session->show("delete_article") // Affiche message lors de la suppression article ?>
<?= $this->session->show("unflag_comment") // Affiche message lors suppression signalement ?>
<?= $this->session->show("delete_comment") // Affiche message lors suppression commentaire ?>

<h2>Articles</h2>

<a href="../public/index.php?route=addArticle">Nouvel article</a>

<table>
    <thead>
        <tr>
            <th>ID</td>
            <th>Titre</td>
            <th>Contenu</td>
            <th>Auteur</td>
            <th>Date</td>
            <th>Actions</td>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($articles as $article) {
        ?>

        <tr>
            <td><?= htmlspecialchars($article->getId()) ?></td>
            <td><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId()) ?>"><?= htmlspecialchars($article->getTitle()) ?></a></td>
            <td><?= substr(htmlspecialchars($article->getContent()), 0, 150) // retourne les 150 premiers char ?></td>
            <td><?= htmlspecialchars($article->getAuthor()) ?></td>
            <td>Créé le : <?= htmlspecialchars($article->getCreationDate()) ?></td>
            <td>
                <a href="../public/index.php?route=editArticle&articleId=<?= $article->getId() ?>">Modifier</a>
                <a href="../public/index.php?route=deleteArticle&articleId=<?= $article->getId() ?>">Supprimer</a>
            </td>
        </tr>

        <?php
        }
        ?>
    </tbody>
</table>

<h2>Commentaires signalés</h2>

<table>
    <thead>
        <tr>
            <th>ID</td>
            <th>Pseudo</td>
            <th>Message</td>
            <th>Date</td>
            <th>Actions</td>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($comments as $comment) {
        ?>

        <tr>
            <td><?= htmlspecialchars($comment->getId()) ?></td>
            <td><?= htmlspecialchars($comment->getNickname()) ?></td>
            <td><?= substr(htmlspecialchars($comment->getContent()), 0, 150) // retourne les 150 premiers char ?></td>
            <td>Créé le : <?= htmlspecialchars($comment->getCreationDate()) ?></td>
            <td>
                <a href="../public/index.php?route=unflagComment&commentId=<?= $comment->getId() ?>">Enlever le signalement</a>
                <a href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId() ?>">Supprimer le commentaire</a>
            </td>
        </tr>

        <?php
        }
        ?>
    </tbody>
</table>

<h2>Utilisateurs</h2>

<a href="../public/index.php">Retour à l'accueil</a>