<?php

// Requêtes relatives aux projets

namespace Mich\Blog\src\DAO; // Permet d'éviter les collisions de classe (deux classes du même nom dans le même projet) en créant une zone spécifique à l'utilisation de cette classe (ne peut être utilisée ailleurs)

use Mich\Blog\src\model\Project;
use Mich\Blog\config\Parameter;

class ProjectDAO extends DAO
{
    // Permet de convertir chaque champ de la table en propriété de l'objet
    private function buildObject($row)
    {
        $project = new Project();
        $project->setId($row["id"]);
        $project->setTitle($row["title"]);
        $project->setContent($row["content"]);
        $project->setImg($row["img"]);
        $project->setWebsite($row["website"]);
        return $project;
    }

    // Récupère les 5 derniers projets (par ordre ascendant)
    public function getLatestProjects()
    {
        $sql = "SELECT id, title, content, img, website FROM (SELECT id, title, content, img, website FROM p5_project ORDER BY id DESC LIMIT 0, 5) AS inverted_subquery ORDER BY id ASC";
        $result = $this->createQuery($sql);
        $latestProjects = [];
        foreach ($result as $row) {
            $projectId = $row["id"];
            $latestProjects[$projectId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $latestProjects;
    }
}
