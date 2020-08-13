<?php

// Contrôleur qui gère l'affichage des erreurs

namespace Mich\Blog\src\controller;

use Mich\Blog\src\model\View;

class ErrorController
{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function errorNotFound()
    {
        return $this->view->render("error_404");
    }

    public function errorServer()
    {
        return $this->view->render("error_500");
    }
}
