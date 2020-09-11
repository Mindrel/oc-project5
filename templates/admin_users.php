<?php
// Vue backend gestion des utilisateurs

$this->title = "Administration - Gestion des utilisateurs"
?>
<section id="admin">
    <!-- Hero secondaire -->
    <div id="hero" class="hero-container-secondary">
        <h1>Administration</h1>

        <div class="white-divider">
            <div class="white-divider-line"></div>
            <div class="white-divider-icon"><i class="fas fa-code"></i></div>
            <div class="white-divider-line"></div>
        </div>
    </div>

    <div class="container admin-section-container">

        <h3>Utilisateurs</h3>

        <?= $this->session->show("delete_user") // Affiche message lors suppression utilisateur ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pseudo</th>
                    <th>Date</th>
                    <th>Rôle</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($users as $user) :
                ?>
                    <tr>
                        <td class="id-cell"><?= htmlspecialchars($user->getId()) ?></td>
                        <td class="nickname-cell"><?= htmlspecialchars($user->getNickname()) ?></td>
                        <td class="date-cell"><?= htmlspecialchars($user->getCreationDate()) ?></td>
                        <td class="role-cell"><?= htmlspecialchars($user->getRole()) ?></td>
                        <td class="actions-cell">
                            <?php
                            if ($user->getRole() != "admin") :
                            ?>
                                <a href="index.php?route=deleteUser&userId=<?= $user->getId() ?>" title="Supprimer" onclick="return confirm('Supprimer cet utilisateur ? \nATTENTION : Action irréversible')"><i class="fas fa-user-alt-slash"></i></a>
                            <?php
                            else :
                            ?>
                                Suppression impossible (admin)
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
    </div>
</section>