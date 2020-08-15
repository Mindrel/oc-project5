<!-- Vue édition d'un post -->

<?php $this->title = "Modifier l'article"; ?>

<h1>Mon blog</h1>

<p>En construction</p>

<div>
    <form method="post" action="../public/index.php?route=editPost&postId=<?= htmlspecialchars($post->getId()); ?>">
        <label for="title">Titre</label><br />
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($post->getTitle()); ?>" /><br />

        <label for="content">Contenu</label><br />
        <textarea id="content" name="content"><?= htmlspecialchars($post->getContent()); ?></textarea><br />

        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" value="<?= htmlspecialchars($post->getAuthor()); ?>" /><br />

        <input type="submit" value="Mettre à jour" id="submit" name="submit" />
    </form>

    <a href="../public/index.php">Retour à l'accueil</a>
</div>