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
    private $request;

    // Le constructor évite la répétition de l'instanciation (appelée avec $this ci-dessous)
    public function __construct()
    {
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
        $this->request = new Request();
    }

    public function run()
    { 
        $route = $this->request->getGet()->get("route"); // Evite la répétition des $_GET
      
        try {

            if (isset($route)) {

                if ($route === "post") { // Si route post on charge le post ayant l'ID demandé
                    $this->frontController->post($this->request->getGet()->get("postId"));  
                } 
                
                else if ($route === "addPost") { // Si route addPost on déclenche l'ajout d'un post
                    $this->backController->addPost($this->request->getPost());
                }

                else if ($route === "editPost") { // Si editPost on déclenche modification d'un post
                    $this->backController->editPost($this->request->getPost(), $this->request->getGet()->get("postId"));
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
