<?php

// Vue formulaire dynamique commentaire

$route = isset($post) && $post->get("id") ? "editComment" : "addComment";
$submit = $route === "addComment" ? "Ajouter" : "Mettre à jour";

?>

<form method="post" action="index.php?route=<?= $route ?>&articleId=<?= htmlspecialchars($article->getId()) ?>">
    <div class="comment-input">
        <input type="text" id="nickname" name="nickname" value="<?= $this->session->get("nickname") // Remplit le pseudo auto puisque user connecté ?>" /> 
        <label for="nickname">Pseudo</label>
    </div>

    <div class="comment-input">
        <textarea id="content" name="content" placeholder="Écrivez votre commentaire ici" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Écrivez votre commentaire ici'"><?= isset($post) ? htmlspecialchars($post->get("content")) : "" ?></textarea>
        <label for="content">Écrivez votre commentaire ci-dessous</label>
    </div>

    <input type="submit" value="Ajouter" id="submit" name="submit" class="colored-submit-button" onclick="return confirm('Confirmez-vous l\'envoi du commentaire ?')" />
</form>