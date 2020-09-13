<?php

// Vue formulaire dynamique article

$route = isset($post) && $post->get("id") ? "editArticle&articleId=".$post->get("id") : "addArticle";
$submit = $route === "addArticle" ? "Envoyer" : "Mettre à jour";
$confirm = $route === "addProject" ? "Ajouter l\'article ?" : "Modifier l\'article ?";

?>

<form method="post" action="index.php?route=<?= $route ?>">
    <label for="title">Titre</label><?= isset($errors["title"]) ? $errors["title"] : "" ?>
    <input type="text" id="title" name="title" value="<?= isset($post) ? htmlspecialchars($post->get("title")): "" ?>" />

    <div><label for="content">Contenu</label><?= isset($errors["content"]) ? $errors["content"] : "" ?></div>
    <textarea id="content" name="content"><?= isset($post) ? htmlspecialchars($post->get("content")): "" ?></textarea>

    <input type="submit" value="<?= $submit ?>" id="submit" name="submit" class="colored-submit-button" onclick="return confirm('<?= $confirm ?>')" />
</form>