<?php
// Vue backend gestion des utilisateurs

$this->title = "Administration - Gestion des utilisateurs"
?>

<h2>Utilisateurs</h2>

<?= $this->session->show("delete_user") // Affiche message lors suppression utilisateur ?>

<table>
    <thead>
        <tr>
            <th>ID</td>
            <th>Pseudo</td>
            <th>Date</td>
            <th>Rôle</td>
            <th>Actions</td>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($users as $user) :
        ?>
            <tr>
                <td><?= htmlspecialchars($user->getId()) ?></td>
                <td><?= htmlspecialchars($user->getNickname()) ?></td>
                <td>Créé le : <?= htmlspecialchars($user->getCreationDate()) ?></td>
                <td><?= htmlspecialchars($user->getRole()) ?></td>
                <td>

                    <?php
                    if ($user->getRole() != "admin") :
                    ?>
                        <a href="index.php?route=deleteUser&userId=<?= $user->getId() ?>">Supprimer</a>
                    <?php
                    else :
                    ?>
                        Suppression impossible
                    <?php
                    endif;
                    ?>
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