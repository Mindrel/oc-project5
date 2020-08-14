<?php

// Routeur

namespace Mich\Blog\config;

use Exception;
use Mich\Blog\src\controller\BackController;
use Mich\Blog\src\controller\FrontController;
use Mich\Blog\src\controller\ErrorController;

class Router
{
    private $frontController;
    private $backController;
    private $errorController;

    // Le constructor évite la répétition de l'instanciation (appelée avec $this ci-dessous)
    public function __construct()
    {
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
    }

    public function run()
    {
        try {

            if (isset($_GET["route"])) {
                
                if ($_GET["route"] === "post") { // Si route post on charge le post ayant l'ID demandé
                    $this->frontController->post($_GET["postId"]);  
                } 
                
                else if ($_GET["route"] === "addPost") { // Si route addPost on déclenche l'ajout d'un post
                    $this->backController->addPost($_POST);
                } 
                
                else {
                    $this->errorController->errorNotFound();
                }

            } else {
                $this->frontController->home(); // Dans tous les autres cas on charge l'accueil
            }

        } catch (Exception $e) {
            $this->errorController->errorServer();
        }
    }
}
