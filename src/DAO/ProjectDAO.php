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
        $project->setLogo($row["logo"]);
        $project->setThumbnail($row["thumbnail"]);
        $project->setWebsite($row["website"]);
        return $project;
    }

    // Récupère tous les projets
    public function getProjects()
    {
        $sql = "SELECT id, title, LEFT(content, 300) AS content, logo, thumbnail, website FROM p5_project ORDER BY id DESC";
        $result = $this->createQuery($sql);
        $projects = [];
        foreach ($result as $row) {
            $projectId = $row["id"];
            $projects[$projectId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $projects;
    }

    // Récupère les 5 derniers projets (par ordre ascendant)
    public function getLatestProjects()
    {
        $sql = "SELECT id, title, content, logo, thumbnail, website FROM (SELECT id, title, content, logo, thumbnail, website FROM p5_project ORDER BY id DESC LIMIT 0, 5) AS inverted_subquery ORDER BY id ASC";
        $result = $this->createQuery($sql);
        $latestProjects = [];
        foreach ($result as $row) {
            $projectId = $row["id"];
            $latestProjects[$projectId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $latestProjects;
    }

    // Récupère un seul projet
    public function getProject($projectId)
    {
        $sql = "SELECT id, title, content, logo, thumbnail, website FROM p5_project WHERE id = ?";
        $result = $this->createQuery($sql, [$projectId]);
        $project = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($project);
    }

    // Ajout d'un projet
    public function addProject(Parameter $post, Parameter $files)
    {
        $imgUploadPath = "public/img/upload/";
        $sql = "INSERT INTO p5_project (title, content, logo, thumbnail, website) VALUES (?, ?, ?, ?, ?)";
        $this->createQuery($sql, [$post->get("title"), $post->get("content"), $imgUploadPath . $files->get("logo")['name'], $imgUploadPath . $files->get("thumbnail")['name'], $post->get("website")]);
    }

    // Modification d'un projet
    public function editProject(Parameter $post, $projectId)
    {
        $sql = "UPDATE p5_project SET title = :title, content = :content, logo = :logo, thumbnail = :thumbnail, website = :website WHERE id = :projectId";
        $this->createQuery($sql, [
            "title" => $post->get("title"),
            "content" => $post->get("content"),
            "logo" => $post->get("logo"),
            "thumbnail" => $post->get("thumbnail"),
            "website" => $post->get("website"),
            "projectId" => $projectId
        ]);
    }

    // Suppression d'un projet 
    public function deleteProject($projectId)
    {
        $sql = "DELETE FROM p5_project WHERE id = ?";
        $this->createQuery($sql, [$projectId]);
    }
}
