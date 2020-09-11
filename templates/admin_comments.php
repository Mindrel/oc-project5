<?php
// Vue backend gestion des commentaires

$this->title = "Administration - Gestion des commentaires"
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

        <h3>Gestion des commentaires</h3>

        <?= $this->session->show("unflag_comment") // Affiche message lors suppression signalement ?>
        <?= $this->session->show("delete_comment") // Affiche message lors suppression commentaire ?>

        <p>Les commentaires signalés apparaissent en priorité dans le haut du tableau</p>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pseudo</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Signalé</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($comments as $comment) :
                ?>
                    <tr>
                        <td class="id-cell"><?= htmlspecialchars($comment->getId()) ?></td>
                        <td class="title-cell"><?= htmlspecialchars($comment->getNickname()) ?></td>
                        <td class="message-cell"><?= substr(htmlspecialchars($comment->getContent()), 0, 80) // retourne les 80 premiers char ?>...</td>
                        <td class="date-cell"><?= htmlspecialchars($comment->getCreationDate()) ?></td>
                        <td class="flag-cell">
                            <?php // Si commentaire signalé (1) = Oui sinon Non (0)
                            if (htmlspecialchars($comment->isFlag()) === "1") :
                                echo "Oui";

                            else :
                                echo "Non";

                            endif;
                            ?>
                        </td>
                        <td class="actions-cell">
                            <a href="index.php?route=unflagComment&commentId=<?= $comment->getId() ?>" title="Ne plus signaler" onclick="return confirm('Ne plus signaler ?')"><i class="far fa-flag"></i></a>
                            <a href="index.php?route=deleteComment&commentId=<?= $comment->getId() ?>" title="Supprimer" onclick="return confirm('Supprimer ce commentaire ? \nATTENTION : Action irréversible !')"><i class="fas fa-comment-slash"></i></a>
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