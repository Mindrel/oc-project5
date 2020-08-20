<?php

// Requêtes relatives aux user

namespace Mich\Blog\src\DAO;

use Mich\Blog\config\Parameter;

class UserDAO extends DAO
{
    // Création nouvel utilisateur
    public function register(Parameter $post)
    {
        $sql = "INSERT INTO p5_user (nickname, pass, creation_date) VALUES (?, ?, NOW())";
        $this->createQuery($sql, [$post->get("nickname"), password_hash($post->get("pass"), PASSWORD_BCRYPT)]);
    }
}