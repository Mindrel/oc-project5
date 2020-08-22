<?php

// Vue changement de mot de passe

$this->title = "Modifier mon mot de passe";

?>

<h1>Mon blog</h1>

<p>En construction</p>

<div>
    <p>Le mot de passe de <?= $this->session->get("nickname") ?> sera modifié</p>

    <form method="post" action="../public/index.php?route=updatePassword">
        <label for="pass">Mot de passe</label><br />
        <input type="password" id="pass" name="pass" /><br />
        <input type="submit" value="Mettre à jour" id="submit" name="submit" />
    </form>

</div>

<br />

<a href="../public/index.php">Retour à l'accueil</a>