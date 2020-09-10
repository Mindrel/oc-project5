<?php
// Vue backend gestion des projets

$this->title = "Administration - Gestion des projets"
?>

<h2>Gestion des projets</h2>
<?= $this->session->show("add_project") // Affiche message lors de l'ajout project ?> 
<?= $this->session->show("edit_project") // Affiche message lors de la modif project ?>
<?= $this->session->show("delete_project") // Affiche message lors de la suppression project ?>

<a href="index.php?route=addproject">Nouveau projet</a>

<table>
    <thead>
        <tr>
            <th>ID</td>
            <th>Titre</td>
            <th>Contenu</td>
            <th>Logo</td>
            <th>Image</td>            
            <th>Site Web</td>
            <th>Actions</td>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($projects as $project) :
        ?>
            <tr>
                <td><?= htmlspecialchars($project->getId()) ?></td>
                <td><a href="index.php?route=project&projectId=<?= htmlspecialchars($project->getId()) ?>"><?= substr(htmlspecialchars($project->getTitle()), 0, 20) // retourne les 20 premiers char ?>...</a></td>
                <td><?= substr(htmlspecialchars($project->getContent()), 0, 50) // retourne les 50 premiers char ?>...</td>
                <td><?= htmlspecialchars($project->getLogo()) ?></td>
                <td><?= htmlspecialchars($project->getImg()) ?></td>
                <td><?= htmlspecialchars($project->getWebsite()) ?></td>
                <td>
                    <a href="index.php?route=editproject&projectId=<?= $project->getId() ?>">Modifier</a>
                    <a href="index.php?route=deleteproject&projectId=<?= $project->getId() ?>">Supprimer</a>
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