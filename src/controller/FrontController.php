<?php

// Contrôleur qui gère le front (partie accessible à tous)

namespace Mich\Blog\src\controller;

use Mich\Blog\config\Parameter;
use Mich\Blog\src\services\SendEmail;

const ITEM_PER_PAGE = 2; // Spécifique aux projets (nb de projets par page)

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

    // Gère l'envoi de mail via le formulaire de contact
    public function homeEmailContactForm()
    {
        $sendEmail = new SendEmail();
        $errors = $sendEmail->errors;

        if (!$errors) {
            return $this->view->render("email_success", []);
        }

        return $this->view->render("email_error", [
            "errors" => $errors
        ]);
    }

    // Gère l'affichage de la page avec tous les projets
    public function projects($page)
    {
        $nbProjects = $this->projectDAO->countProjects();
        $nbPages = ceil($nbProjects / ITEM_PER_PAGE);

        // Si param url page > 0 et <= au nb de pages on affiche la page des projets demandée
        if ($page > 0 && $page <= $nbPages) {
            $offset = ITEM_PER_PAGE * ($page) - ITEM_PER_PAGE;
            $projects = $this->projectDAO->getProjects(ITEM_PER_PAGE, $offset);
            return $this->view->render("projects", [
                "projects" => $projects
            ]);
        }

        // Par défaut on renvoie toujours vers la page 1 
        header("Location: index.php?route=projects&page=1");
    }

    // Gère l'affichage de la page projet demandée
    public function project($projectId)
    {
        $project = $this->projectDAO->getProject($projectId);
        return $this->view->render("single_project", [
            "project" => $project
        ]);
    }

    // Gère l'affichage du blog avec tous les articles
    public function blog()
    {
        $articles = $this->articleDAO->getArticles();
        return $this->view->render("blog", [
            "articles" => $articles
        ]);
    }

    // Gère l'affichage de la page de l'article demandé et les com associés
    public function article($articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        $comments = $this->commentDAO->getCommentsFromArticle($articleId);
        return $this->view->render("single_article", [
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
                $this->session->set("add_comment", '<p class="check-message"><i class="fas fa-check-circle"></i>Votre commentaire a bien été ajouté</p>');
                header("Location: index.php?route=blog");
            }

            $article = $this->articleDAO->getArticle($articleId);
            $comments = $this->commentDAO->getCommentsFromArticle($articleId);
            return $this->view->render("single_article", [
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
        $this->session->set("flag_comment", '<p class="check-message"><i class="fas fa-check-circle"></i>Le commentaire a bien été signalé</p>');
        header("Location: index.php?route=blog");
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
                $this->session->set("login", '<p class="check-message"><i class="fas fa-check-circle"></i>Vous êtes connecté. N\'hésitez pas à laisser des commentaires !</p>');
                $this->session->set("id", $result["result"]["id"]);
                $this->session->set("role", $result["result"]["name"]);
                $this->session->set("nickname", $post->get("nickname"));
                header("Location: index.php?route=blog");
            } else {
                $this->session->set("error_login", '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Identifiants incorrects</p>');
                return $this->view->render("login", [
                    "post" => $post
                ]);
            }
        }
        return $this->view->render("login");
    }
}
