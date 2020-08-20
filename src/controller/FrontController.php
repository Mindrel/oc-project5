<?php

// Contrôleur qui gère le front (partie accessible à tous)

namespace Mich\Blog\src\controller;

use Mich\Blog\config\Parameter;

class FrontController extends Controller
{
    // Gère l'affichage de la page d'accueil : Affiche tous les articles
    public function home()
    {
        $articles = $this->articleDAO->getArticles();
        return $this->view->render("home", [
            "articles" => $articles
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
            $this->userDAO->register($post);
            $this->session->set("register", "Votre inscription a bien été effectuée");
            header("Location: ../public/index.php");
        }
        return $this->view->render("register");
    }
}
