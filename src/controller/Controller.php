<?php

// Controller qui sert à centraliser les données utilisées par les controllers qui héritent de cette classe (use, instanciations...)

namespace Mich\Blog\src\controller;

use Mich\Blog\src\DAO\CommentDAO;
use Mich\Blog\src\DAO\PostDAO; // use le namespace nécessaire sans quoi l'objet PostDAO sera introuvable lors de l'instanciation (mieux que NEW \mich\Blog\src\DAO\PostDAO car évite la répétition)
use Mich\Blog\src\model\View;

abstract class Controller // Abstrait car ne sera jamais instancié
{
    protected $postDAO; // On utilise l'héritage dans nos classes filles
    protected $commentDAO;
    protected $view;

    // Constructor pour éviter les répétitions d'instanciation
    public function __construct()
    {
        $this->postDAO = new PostDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
    }
}
