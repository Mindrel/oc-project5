<?php
// Vue backend gestion des projets

$this->title = "Administration - Gestion des projets"
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

        <h3>Gestion des projets</h3>

        <?= $this->session->show("add_project") // Affiche message lors de l'ajout project ?>
        <?= $this->session->show("edit_project") // Affiche message lors de la modif project ?>
        <?= $this->session->show("delete_project") // Affiche message lors de la suppression project ?>

        <a href="index.php?route=addProject" class="text-link">Créer un nouveau projet <i class="fas fa-plus-circle"></i></a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Logo</th>
                    <th>Image</th>
                    <th>Site Web</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($projects as $project) :
                ?>
                    <tr>
                        <td class="id-cell"><?= htmlspecialchars($project->getId()) ?></td>
                        <td class="title-cell"><a href="index.php?route=project&projectId=<?= htmlspecialchars($project->getId()) ?>" class="text-link" title="Accéder dans un nouvel onglet"><?= substr(htmlspecialchars($project->getTitle()), 0, 20) // retourne les 20 premiers char ?>...</a></td>
                        <td class="content-cell"><?= substr(htmlspecialchars($project->getContent()), 0, 80) // retourne les 80 premiers char ?>...</td>
                        <td class="logo-cell"><?= htmlspecialchars($project->getLogo()) ?></td>
                        <td class="img-cell"><?= htmlspecialchars($project->getImg()) ?></td>
                        <td class="website-cell"><a href="<?= htmlspecialchars($project->getWebsite()) ?>" class="text-link" title="Ouvrir dans un nouvel onglet" target="_blank"><?= htmlspecialchars($project->getWebsite()) ?></a></td>
                        <td class="actions-cell">
                            <a href="index.php?route=editProject&projectId=<?= $project->getId() ?>" title="Modifier"><i class="fas fa-pencil-alt"></i></a>
                            <a href="index.php?route=deleteProject&projectId=<?= $project->getId() ?>" title="Supprimer" onclick="return confirm ('Supprimer ce projet ? \nATTENTION : Action irréversible !')"><i class="fas fa-trash"></i></a>
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