<?php

// Contrôleur qui gère le front (partie accessible à tous)

namespace Mich\Blog\src\controller;

class FrontController
{
    // Gère l'affichage de la page d'accueil : Affiche tous les post
    public function home()
    {
        $posts = $this->postDAO->getPosts();
        return $this->view->render("home", [
            "posts" => $posts
        ]);
    }

    // Gère l'affichage de la page du post demandé et les com associés
    public function post($postId)
    {
        $post = $this->postDAO->getPost($postId);
        $comments = $this->commentDAO->getCommentsFromPost($postId);
        return $this->view->render("single", [
            "post" => $post,
            "comments" => $comments
        ]);
    }
}
