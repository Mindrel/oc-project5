<?php

// Contrôleur qui gère le front (partie accessible à tous)

namespace Mich\Blog\src\controller;

use Mich\Blog\config\Parameter;

class FrontController extends Controller
{
    // Gère l'affichage de la page d'accueil : Affiche les 5 derniers projets et le dernier article
    public function home()
    {
        $latestProjects = $this->projectDAO->getLatestProjects();
        $latestArticle = $this->articleDAO->getLatestArticle();
        return $this->view->render("home", [
            "latestProjects" => $latestProjects,
            "latestArticle" => $latestArticle
        ]);
    }

    // Gère l'affichage de la page de l'article demandé et les com associés
    public function article($articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        $comments = $this->commentDAO->getCommentsFromArticle($articleId);
        return $this->view->render("single", [
            "article" => $article,
            "comments" => $comments
        ]);
    }

    // Ajout d'un commentaire
    public function addComment(Parameter $post, $articleId)
    {
        if ($post->get("submit")) {
            $errors = $this->validation->validate($post, "Comment");
            
            if (!$errors) {
                $this->commentDAO->addComment($post, $articleId);
                $this->session->set("add_comment", "Le nouveau commentaire a bien été ajouté");
                header("Location: ../public/index.php");
            }
            
            $article = $this->articleDAO->getArticle($articleId);
            $comments = $this->commentDAO->getCommentsFromArticle($articleId);
            return $this->view->render("single", [
                "article" => $article,
                "comments" => $comments,
                "post" => $post,
                "errors" => $errors
            ]);
        }
    }

    // Signalement d'un commentaire
    public function flagComment($commentId)
    {
        $this->commentDAO->flagComment($commentId);
        $this->session->set("flag_comment", "Le commentaire a bien été signalé");
        header("Location: ../public/index.php");
    }

    // Inscription utilisateur
    public function register(Parameter $post)
    {
        if ($post->get("submit")) {
            $errors = $this->validation->validate($post, "User");

            if ($this->userDAO->checkUser($post)) {
                $errors["nickname"] = $this->userDAO->checkUser($post);
            }

            if (!$errors) {
                $this->userDAO->register($post);
                $this->session->set("register", '<p class="check-message"><i class="fas fa-check-circle"></i>Votre inscription a bien été effectuée, vous pouvez vous connecter</p>');
                header("Location: index.php?route=login");
            }

            return $this->view->render("register", [
                "post" => $post,
                "errors" => $errors
            ]);
        }
        return $this->view->render("register");
    }

    // Connexion utilisateur
    public function login(Parameter $post)
    {
        if ($post->get("submit")) {
            $result = $this->userDAO->login($post);

            if ($result && $result["isPasswordValid"]) {
                $this->session->set("login", "Content de vous revoir !");
                $this->session->set("id", $result["result"]["id"]);
                $this->session->set("role", $result["result"]["name"]);
                $this->session->set("nickname", $post->get("nickname"));
                header("Location: index.php");
            } else {
                $this->session->set("error_login", '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Pseudo ou mot de passe incorrects</p>');
                return $this->view->render("login", [
                    "post" => $post
                ]);
            }
        }
        return $this->view->render("login");
    }
}
