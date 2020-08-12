<?php

// Requêtes relatives aux commentaires

namespace Mich\Blog\src\DAO; // Permet d'éviter les collisions de classe (deux classes du même nom dans le même projet) en créant une zone spécifique à l'utilisation de cette classe (ne peut être utilisée ailleurs)

use Mich\Blog\src\model\Comment;

class CommentDAO extends DAO
{   
    private function buildObject($row)
    {
        $comment = new Comment();
        $comment->setId($row["id"]);
        $comment->setNickname($row["nickname"]);
        $comment->setContent($row["content"]);
        $comment->setCreationDate($row["creation_date"]);
        return $comment;
    }

    // Récupère tous les commentaires par post
    public function getCommentsFromPost($postId)
    {
        $sql = "SELECT id, nickname, content, creation_date FROM p5_comment WHERE post_id = ? ORDER BY creation_date DESC";
        $result = $this->createQuery($sql, [$postId]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row["id"];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }
}
