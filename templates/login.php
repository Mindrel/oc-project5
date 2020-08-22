<?php

// Vue connexion

$this->title  = "Connexion";

?>

<h1>Mon blog</h1>

<p>En construction</p>

<?= $this->session->show("error_login") ?>

<div>
    <form method="post" action="../public/index.php?route=login">
        <label for="nickname">Pseudo</label><br />
        <input type="text" id="nickname" name="nickname" value="<?= isset($post) ? htmlspecialchars($post->get("nickname")) : "" ?>"/><br />

        <label for="pass">Mot de passe</label><br />
        <input type="password" id="pass" name="pass" /><br />

        <input type="submit" value="Connexion" id="submit" name="submit" />
    </form>

    <a href="../public/index.php">Retour à l'accueil</a>
</div>
