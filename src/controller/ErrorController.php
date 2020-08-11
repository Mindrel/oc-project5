<?php

// Contrôleur qui gère l'affichage des erreurs

namespace Mich\Blog\src\controller;

class ErrorController
{
    public function errorNotFound()
    {
        require "../templates/error_404.php";
    }

    public function errorServer()
    {
        require "../templates/error_500.php";
    }
}
