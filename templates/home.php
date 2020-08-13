<!-- Vue page d'accueil -->

<?php $this->title = "Accueil PROJET 5"; ?>

<h1>PROJET 5</h1>
<p>En construction</p>
<?php
foreach ($posts as $post) {
?>
    <div>
        <h2><a href="../public/index.php?route=post&postId=<?= htmlspecialchars($post->getId()); ?>"><?= htmlspecialchars($post->getTitle()); ?></a></h2>
        <p><?= htmlspecialchars($post->getContent()); ?></p>
        <p><?= htmlspecialchars($post->getAuthor()); ?></p>
        <p>Créé le : <?= htmlspecialchars($post->getCreationDate()); ?></p>
    </div>
    <br />
<?php
}
?>