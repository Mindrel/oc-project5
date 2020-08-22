<!-- Vue page d'accueil -->

<?php $this->title = "Accueil PROJET 5" ?>

<h1>PROJET 5</h1>
<p>En construction</p>

<?= $this->session->show("add_article") // Affiche message lors de l'ajout article ?> 
<?= $this->session->show("edit_article") // Affiche message lors de la modif article ?>
<?= $this->session->show("delete_article") // Affiche message lors de la suppression article ?>
<?= $this->session->show("add_comment") // Message apparaît si commentaire posté ?>
<?= $this->session->show("flag_comment") // Message apparaît si commentaire signalé ?>
<?= $this->session->show("delete_comment") // Message apparaît si commentaire supprimé ?>
<?= $this->session->show("register"); // Message apparaît si nouvel utilisateur inscrit ?>
<?= $this->session->show("login"); // Message apparaît si utilisateur connecté?>

<a href="../public/index.php?route=register">Inscription</a>
<a href="../public/index.php?route=login">Connexion</a>
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