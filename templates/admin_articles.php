<?php
// Vue backend gestion des articles

$this->title = "Administration - Gestion des articles"
?>

<h2>Articles</h2>

<?= $this->session->show("add_article") // Affiche message lors de l'ajout article ?> 
<?= $this->session->show("edit_article") // Affiche message lors de la modif article ?>
<?= $this->session->show("delete_article") // Affiche message lors de la suppression article ?>

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
        foreach ($articles as $article) :
        ?>
            <tr>
                <td><?= htmlspecialchars($article->getId()) ?></td>
                <td><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId()) ?>"><?= substr(htmlspecialchars($article->getTitle()), 0, 20) ?>...</a></td>
                <td><?= substr(htmlspecialchars($article->getContent()), 0, 50) // retourne les 50 premiers char ?>...</td>
                <td><?= htmlspecialchars($article->getAuthor()) ?></td>
                <td>Créé le : <?= htmlspecialchars($article->getCreationDate()) ?></td>
                <td>
                    <a href="index.php?route=editArticle&articleId=<?= $article->getId() ?>">Modifier</a>
                    <a href="index.php?route=deleteArticle&articleId=<?= $article->getId() ?>">Supprimer</a>
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