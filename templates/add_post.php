<!-- Vue ajout d'un post -->

<?php $this->title = "PROJET 5 : Nouveau post"; ?>

<h1>Mon blog</h1>
<p>En construction</p>
<div>
    <form method="post" action="index.php?route=addPost">
        <label for="title">Titre</label><br />
        <input type="text" id="title" name="title" /><br />

        <label for="content">Contenu</label><br />
        <textarea id=content name="content"></textarea><br />

        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" /><br />
        <input type="submit" value="Envoyer" id="submit" name="submit" />
    </form>

    <a href="../public/index.php">Retour à l'accueil</a>
</div>