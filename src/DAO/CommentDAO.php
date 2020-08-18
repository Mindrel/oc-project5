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
        return $comment;
    }

    // Récupère tous les commentaires par article
    public function getCommentsFromArticle($articleId)
    {
        $sql = "SELECT id, nickname, content, creation_date FROM p5_comment WHERE article_id = ? ORDER BY creation_date DESC";
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
        $sql = "INSERT INTO p5_comment (nickname, content, creation_date, article_id) VALUES (?, ?, NOW(), ?)";
        $this->createQuery($sql, [$post->get("nickname"), $post->get("content"), $articleId]);
    }
}
