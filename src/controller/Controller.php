<?php

// Controller qui sert à centraliser les données utilisées par les controllers qui héritent de cette classe (use, instanciations...)

namespace Mich\Blog\src\controller;

use Mich\Blog\src\DAO\CommentDAO;
use Mich\Blog\src\DAO\ArticleDAO; // use le namespace nécessaire sans quoi l'objet ArticleDAO sera introuvable lors de l'instanciation (mieux que NEW \mich\Blog\src\DAO\ArticleDAO car évite la répétition)
use Mich\Blog\src\model\View;
use Mich\Blog\config\Request;
use Mich\Blog\src\constraint\Validation;

abstract class Controller // Abstrait car ne sera jamais instancié
{
    protected $articleDAO; // On utilise l'héritage dans nos classes filles
    protected $commentDAO;
    protected $view;
    private $request;
    protected $get;
    protected $post;
    protected $session;
    protected $validation;

    // Constructor pour éviter les répétitions d'instanciation
    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
        $this->request = new Request();
        $this->validation = new Validation();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }
}
