<!-- Vue formulaire dynamique commentaire -->

<form method="post" action="../public/index.php?route=addComment&articleId=<?= htmlspecialchars($article->getId()) ?>">
    <label for="nickname">Pseudo</label><br />
    <input type="text" id="nickname" name="nickname" /><br />

    <label for="content">Message</label><br />
    <textarea id="content" name="content"></textarea><br />

    <input type="submit" value="Ajouter" id="submit" name="submit" />
</form>