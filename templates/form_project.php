<?php

// Vue formulaire dynamique article

$route = isset($post) && $post->get("id") ? "editProject&projectId=".$post->get("id") : "addProject";
$submit = $route === "addProject" ? "Envoyer" : "Mettre à jour";
$confirm = $route === "addProject" ? "Ajouter le projet ?" : "Modifier le projet ?";

?>

<form method="post" action="index.php?route=<?= $route ?>">
    <label for="title">Titre</label><?= isset($errors["title"]) ? $errors["title"] : "" ?>
    <input type="text" id="title" name="title" value="<?= isset($post) ? htmlspecialchars($post->get("title")) : "" ?>" />

    <label for="logo">Logo</label><?= isset($errors["logo"]) ? $errors["logo"] : "" ?>
    <input type="file" id="logo" name="logo" value="<?= isset($post) ? htmlspecialchars($post->get("logo")) : "" ?>" />

    <label for="img">Image</label><?= isset($errors["img"]) ? $errors["img"] : "" ?>
    <input type="file" id="img" name="img" value="<?= isset($post) ? htmlspecialchars($post->get("img")) : "" ?>" />

    <label for="website">URL du projet</label><?= isset($errors["website"]) ? $errors["website"] : "" ?>
    <input type="text" id="website" name="website" value="<?= isset($post) ? htmlspecialchars($post->get("website")) : "" ?>" />

    <label for="content">Contenu</label><?= isset($errors["content"]) ? $errors["content"] : "" ?>
    <textarea id="content" name="content"><?= isset($post) ? htmlspecialchars($post->get("content")) : "" ?></textarea>

    <input type="submit" value="<?= $submit ?>" id="submit" name="submit" class="colored-submit-button" onclick="return confirm('<?= $confirm ?>')" />
</form>