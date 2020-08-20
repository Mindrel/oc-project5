<?php

// Vue inscription utilisateur

$this->title = "Inscription";

?>

<h1>Mon blog</h1>

<p>En construction</p>

<div>
    <form method="post" action="../public/index.php?route=register">
        <label for="nickname">Pseudo</label><br />
        <input type="text" id="nickname" name="nickname" value="<?= isset($post) ? htmlspecialchars($post->get("nickname")) : "" ?>"/><br />
        <?= isset($errors["nickname"]) ? $errors["nickname"] : "" ?>

        <label for="pass">Mot de passe</label><br />
        <input type="password" id="pass" name="pass"><br />
        <?= isset($errors["pass"]) ? $errors["pass"] : "" ?>

        <input type="submit" value="Inscription" id="submit" name="submit" />
    </form>

    <a href="../public/index.php">Retour à l'accueil</a>

</div>