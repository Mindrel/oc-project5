<?php

// Contrôleur qui gère l'affichage des erreurs

namespace Mich\Blog\src\controller;

class ErrorController
{
     public function errorNotFound()
    {
        return $this->view->render("error_404");
    }

    public function errorServer()
    {
        return $this->view->render("error_500");
    }
}
