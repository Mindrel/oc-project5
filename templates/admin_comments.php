<?php
// Vue backend gestion des commentaires

$this->title = "Administration - Gestion des commentaires"
?>

<h2>Gestion des commentaires</h2>
<?= $this->session->show("unflag_comment") // Affiche message lors suppression signalement ?>
<?= $this->session->show("delete_comment") // Affiche message lors suppression commentaire ?>
<?= $this->session->show("delete_comment") // Message apparaît si commentaire supprimé ?>


<table>
    <thead>
        <tr>
            <th>ID</td>
            <th>Pseudo</td>
            <th>Message</td>
            <th>Date</td>
            <th>Actions</td>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($comments as $comment) :
        ?>
            <tr>
                <td><?= htmlspecialchars($comment->getId()) ?></td>
                <td><?= htmlspecialchars($comment->getNickname()) ?></td>
                <td><?= substr(htmlspecialchars($comment->getContent()), 0, 50) // retourne les 50 premiers char ?></td>
                <td>Créé le : <?= htmlspecialchars($comment->getCreationDate()) ?></td>
                <td>
                    <a href="index.php?route=unflagComment&commentId=<?= $comment->getId() ?>">Enlever le signalement</a>
                    <a href="index.php?route=deleteComment&commentId=<?= $comment->getId() ?>">Supprimer le commentaire</a>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>

<div>
    <a href="index.php?route=administration" class="text-link">Retour au hub admin</a> | <a href="index.php" class="text-link">Retour à l'accueil</a> | <a href="index.php?route=blog" class="text-link">Retour au blog</a>
</div>