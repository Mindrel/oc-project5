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

                
                if ($route === "projects") { // Si route projects on affiche la page tous les projets
                    $this->frontController->projects();
                }

                else if ($route === "blog") { // Si route blog on affiche la page blog avec tous les articles
                    $this->frontController->blog();
                }
                
                else if ($route === "article") { // Si route article on charge l'article ayant l'ID demandé
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

                else if ($route === "addComment") { // Si addComment ajoute commentaire
                    $this->frontController->addComment($this->request->getPost(), $this->request->getGet()->get("articleId"));
                }

                else if ($route === "flagComment") { // Si flagComment signale commentaire
                    $this->frontController->flagComment($this->request->getGet()->get("commentId"));
                }
                
                else if ($route ==="unflagComment") { // Enlève le signalement d'un com via l'espace admin
                    $this->backController->unflagComment($this->request->getGet()->get("commentId"));
                }

                else if ($route === "deleteComment") { // Si deleteComment supprime commentaire
                    $this->backController->deleteComment($this->request->getGet()->get("commentId"));
                }

                else if ($route === "register") { // Si route register alors on lance l'inscription
                    $this->frontController->register($this->request->getPost());
                }

                else if ($route === "login") { // Connexion utilisateur
                    $this->frontController->login($this->request->getPost());
                }

                else if ($route === "logout") { // Déconnexion utilisateur
                    $this->backController->logout();
                }
                
                else if ($route === "profile") { // Accès profil utilisateur
                    $this->backController->profile();
                }

                else if ($route === "updatePassword") { // Modif mot de passe utilisateur
                    $this->backController->updatePassword($this->request->getPost());
                }

                else if ($route === "deleteAccount") { // Suppression compte utilisateur
                    $this->backController->deleteAccount();
                }

                else if ($route === "deleteUser") { // Suppression utilisateur depuis espace admin
                    $this->backController->deleteUser($this->request->getGet()->get("userId"));
                }

                else if ($route ==="administration") { // Accès espace admin
                    $this->backController->administration();
                }

                else { // Si la route est différente des précedentes alors error not found
                    $this->errorController->errorNotFound();
                }

            } else {
                $this->frontController->home(); // Dans tous les autres cas on charge l'accueil
            }

        } catch (Exception $e) {
        //    $_SESSION["error"] = $e->getMessage();
           $this->errorController->errorServer();
        }
    }
}
