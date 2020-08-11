<?php

// Requêtes relatives aux commentaires

namespace Mich\Blog\src\DAO; // Permet d'éviter les collisions de classe (deux classes du même nom dans le même projet) en créant une zone spécifique à l'utilisation de cette classe (ne peut être utilisée ailleurs)

class CommentDAO extends DAO
{   
    // Récupère tous les commentaires par post
    public function getCommentsFromPost($postId)
    {
        $sql = "SELECT id, nickname, content, creation_date FROM p5_comment WHERE post_id = ? ORDER BY creation_date DESC";
        return $this->createQuery($sql, [$postId]);
    }
}
