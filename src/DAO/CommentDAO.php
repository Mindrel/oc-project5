<?php

class CommentDAO extends DAO
{   
    // Récupère tous les commentaires par post
    public function getCommentsFromPost($postId)
    {
        $sql = "SELECT id, nickname, content, creation_date FROM p5_comment WHERE post_id = ? ORDER BY creation_date DESC";
        return $this->createQuery($sql, [$postId]);
    }
}
