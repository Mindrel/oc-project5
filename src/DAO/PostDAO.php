<?php

// Requêtes relatives aux post

namespace Mich\Blog\src\DAO; // Permet d'éviter les collisions de classe (deux classes du même nom dans le même projet) en créant une zone spécifique à l'utilisation de cette classe (ne peut être utilisée ailleurs)

use Mich\Blog\src\model\Post;

class PostDAO extends DAO
{
    // Permet de convertir chaque champ de la table en propriété de l'objet
    private function buildObject($row)
    {
        $post = new Post();
        $post->setId($row["id"]);
        $post->setTitle($row["title"]);
        $post->setContent($row["content"]);
        $post->setAuthor($row["author"]);
        $post->setCreationDate($row["creation_date"]);
        return $post;
    }

    // Récupère tous les posts
    public function getPosts()
    {
        $sql = "SELECT id, title, content, author, creation_date FROM p5_post ORDER BY id DESC";
        $result = $this->createQuery($sql);
        $posts = [];
        foreach ($result as $row) {
            $postId = $row["id"];
            $posts[$postId] = $this->buildObject($row); // Pour renvoyer des objets de la classe Post
        }
        $result->closeCursor(); // Evite un max l'utilisation de php dans la vue
        return $posts;
    }

    // Récupère un seul post
    public function getPost($postId)
    {
        $sql = "SELECT id, title, content, author, creation_date FROM p5_post WHERE id = ?";
        $result = $this->createQuery($sql, [$postId]);
        $post = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($post);
    }

    // Ajout d'un post
    public function addPost($post)
    {
        extract($post);
        $sql = "INSERT INTO p5_post (title, content, author, creation_date) VALUES (?, ?, ?, NOW())";
        $this->createQuery($sql, [$title, $content, $author]);
    }
}   
