<?php

// Vue formulaire dynamique commentaire

$route = isset($post) && $post->get("id") ? "editComment" : "addComment";
$submit = $route === "addComment" ? "Ajouter" : "Mettre à jour";

?>

<form method="post" action="../public/index.php?route=<?= $route ?>&articleId=<?= htmlspecialchars($article->getId()) ?>">
    <label for="nickname">Pseudo</label><br />
    <input type="text" id="nickname" name="nickname" value="<?= isset($post) ? htmlspecialchars($post->get("nickname")) : "" ?>"/><br />
    <?= isset($errors["nickname"]) ? $errors["nickname"] : "" ?>

    <label for="content">Message</label><br />
    <textarea id="content" name="content"><?= isset($post) ? htmlspecialchars($post->get("content")) : "" ?></textarea><br />
    <?= isset($errors["content"]) ? $errors["content"] : "" ?>

    <input type="submit" value="Ajouter" id="submit" name="submit" />
</form>