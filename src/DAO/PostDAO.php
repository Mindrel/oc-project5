<?php

class PostDAO extends DAO
{
    // Récupère tous les posts
    public function getPosts()
    {
        $sql = "SELECT id, title, content, author, creation_date FROM p5_post ORDER BY id DESC";
        return $this->createQuery($sql);
    }

    // Récupère un seul post
    public function getPost($postId)
    {
        $sql = "SELECT id, title, content, author, creation_date FROM p5_post WHERE id = ?";
        return $this->createQuery($sql, [$postId]);
    }
}
