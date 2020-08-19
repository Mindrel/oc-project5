<?php

// Requêtes relatives aux commentaires

namespace Mich\Blog\src\DAO; // Permet d'éviter les collisions de classe (deux classes du même nom dans le même projet) en créant une zone spécifique à l'utilisation de cette classe (ne peut être utilisée ailleurs)

use Mich\Blog\config\Parameter;
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
        $comment->setFlag($row["flag"]);
        return $comment;
    }

    // Récupère tous les commentaires par article
    public function getCommentsFromArticle($articleId)
    {
        $sql = "SELECT id, nickname, content, creation_date, flag FROM p5_comment WHERE article_id = ? ORDER BY creation_date DESC";
        $result = $this->createQuery($sql, [$articleId]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row["id"];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }

    // Ajout d'un commentaire
    public function addComment(Parameter $post, $articleId)
    {
        $sql = "INSERT INTO p5_comment (nickname, content, creation_date, flag, article_id) VALUES (?, ?, NOW(), ?, ?)";
        $this->createQuery($sql, [$post->get("nickname"), $post->get("content"), 0, $articleId]);
    }

    // Signalement d'un commmentaire
    public function flagComment($commentId)
    {
        $sql = "UPDATE p5_comment SET flag = ? WHERE id = ?";
        $this->createQuery($sql, [1, $commentId]);
    }

    // Suppression d'un commentaire
    public function deleteComment($commentId)
    {
        $sql = "DELETE FROM p5_comment WHERE id = ?";
        $this->createQuery($sql, [$commentId]);
    }
}
