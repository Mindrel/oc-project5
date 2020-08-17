<?php

// Contrôleur qui gère le front (partie accessible à tous)

namespace Mich\Blog\src\controller;

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
}
