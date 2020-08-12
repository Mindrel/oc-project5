<?php

// Contrôleur qui gère le front (partie accessible à tous)

namespace Mich\Blog\src\controller;

use Mich\Blog\src\DAO\CommentDAO;
use Mich\Blog\src\DAO\PostDAO; // use le namespace nécessaire sans quoi l'objet PostDAO sera introuvable lors de l'instanciation (mieux que NEW \mich\Blog\src\DAO\PostDAO car évite la répétition)

class FrontController
{
    // Constructor pour éviter les répétitions d'instanciation
    public function __construct()
    {
        $this->postDAO = new PostDAO();
        $this->commentDAO = new CommentDAO();   
    }

    // Gère l'affichage de la page d'accueil : Affiche tous les post
    public function home()
    {
        $posts = $this->postDAO->getPosts();
        require "../templates/home.php";
    }

    // Gère l'affichage de la page du post demandé et les com associés
    public function post($postId)
    {
        $post = $this->postDAO->getPost($postId);
        $comments = $this->commentDAO->getCommentsFromPost($postId);
        require "../templates/single.php";
    }
}
