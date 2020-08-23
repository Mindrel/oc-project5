<?php

// Vue profil utilisateur

$this->title = "Mon profil"; 

?>

<h1>Mon blog</h1>

<p>En construction</p>

<?= $this->session->show("update_password") // Message apparaît après modif password ?>
<?= $this->session->show("not_admin") // Apparaît si tentative d'action nécessitant d'être admin ?>

<div>
    <h2><?= $this->session->get("nickname") ?></h2>
    <p><?= $this->session->get("id") ?></p>
    <a href="../public/index.php?route=updatePassword">Modifier le mot de passe</a>
    <a href="../public/index.php?route=deleteAccount">Supprimer ce compte utilisateur</a>
</div>

<br />

<a href="../public/index.php">Retour à l'accueil</a>
