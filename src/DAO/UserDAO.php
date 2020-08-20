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

    // Vérification de l'existence de l'utilisateur
    public function checkUser(Parameter $post)
    {
        $sql = "SELECT COUNT(nickname) FROM p5_user WHERE nickname = ?";
        $result = $this->createQuery($sql, [$post->get("nickname")]);
        $isUnique = $result->fetchColumn();
        if ($isUnique) {
            return "<p>Le pseudo existe déjà</p>";
        }
    }
}