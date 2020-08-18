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

                if ($route === "article") { // Si route article on charge l'article ayant l'ID demandé
                    $this->frontController->article($this->request->getGet()->get("articleId"));
                } 
                
                else if ($route === "addArticle") { // Si route addArticle on déclenche l'ajout d'un article
                    $this->backController->addArticle($this->request->getPost());
                }

                else if ($route === "editArticle") { // Si editArticle on déclenche modification d'un article
                    $this->backController->editArticle($this->request->getPost(), $this->request->getGet()->get("articleId"));
                }

                else if ($route === "deleteArticle") { // Si deleteArticle on déclenche suppression article
                    $this->backController->deleteArticle($this->request->getGet()->get("articleId"));
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
