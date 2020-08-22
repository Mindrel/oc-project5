<?php

// Requêtes relatives aux user

namespace Mich\Blog\src\DAO;

use Mich\Blog\config\Parameter;

class UserDAO extends DAO
{
    // Création nouvel utilisateur
    public function register(Parameter $post)
    {
        $this->checkUser($post);
        $sql = "INSERT INTO p5_user (nickname, pass, creation_date, role_id) VALUES (?, ?, NOW(), ?)";
        $this->createQuery($sql, [$post->get("nickname"), password_hash($post->get("pass"), PASSWORD_BCRYPT), 2]);
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

    // Vérification des identifiants utilisateur lors connexion + Vérif du rôle (admin ou user) pour accéder ensuite à l'administration du site
    public function login(Parameter $post)
    {
        $sql = "SELECT p5_user.id, p5_user.role_id, p5_user.pass, p5_role.name FROM p5_user INNER JOIN p5_role ON p5_role.id = p5_user.role_id WHERE nickname = ?";
        $data = $this->createQuery($sql, [$post->get("nickname")]);
        $result = $data->fetch();
        $isPasswordValid = password_verify($post->get("pass"), $result["pass"]);
        return [
            "result" => $result,
            "isPasswordValid" => $isPasswordValid
        ];
    }

    // Modification du mot de passe utilisateur
    public function updatePassword(Parameter $post, $nickname)
    {
        $sql = "UPDATE p5_user SET pass = ? WHERE nickname = ?";
        $this->createQuery($sql, [password_hash($post->get("pass"), PASSWORD_BCRYPT), $nickname]);
    }

    // Suppression d'un compte utilisateur
    public function deleteAccount($nickname)
    {
        $sql = "DELETE FROM p5_user WHERE nickname = ?";
        $this->createQuery($sql, [$nickname]);
    }
}