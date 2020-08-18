<!-- Vue page d'accueil -->

<?php $this->title = "Accueil PROJET 5" ?>

<h1>PROJET 5</h1>
<p>En construction</p>

<?= $this->session->show("add_article") // Affiche message lors de l'ajout article ?> 
<?= $this->session->show("edit_article") // Affiche message lors de la modif article ?>
<?= $this->session->show("delete_article") // Affiche message lors de la suppression article ?>

<a href="../public/index.php?route=addArticle">Nouvel article</a>

<?php
foreach ($articles as $article) {
?>
    <div>
        <h2><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId()) ?>"><?= htmlspecialchars($article->getTitle()) ?></a></h2>
        <p><?= htmlspecialchars($article->getContent()) ?></p>
        <p><?= htmlspecialchars($article->getAuthor()) ?></p>
        <p>Créé le : <?= htmlspecialchars($article->getCreationDate()) ?></p>
    </div>
    <br />
<?php
}
?>