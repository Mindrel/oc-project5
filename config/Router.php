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

                switch ($route) {

                    case "projects": // Si route vaut projects on affiche la page tous les projets
                        $this->frontController->projects($this->request->getGet()->get("page"));
                        break;

                    case "project": // Si project on charge le projet ayant l'ID demandé
                        $this->frontController->project($this->request->getGet()->get("projectId"));
                        break;

                    case "blog": // Si blog on affiche la page blog avec tous les articles
                        $this->frontController->blog();
                        break;

                    case "article": // Si article on charge l'article ayant l'ID demandé
                        $this->frontController->article($this->request->getGet()->get("articleId"));
                        break;

                    case "sendEmail": // sendEmail on déclenche l'envoi de mail via formulaire de contact
                        $this->frontController->homeEmailContactForm();
                        break;

                    case "addProject": // Si addProject on déclenche l'ajout d'un projet
                        $this->backController->addProject($this->request->getPost(), $this->request->getFiles());
                        break;

                    case "editProject": // Si editProject on déclenche modification d'un projet
                        $this->backController->editProject($this->request->getPost(), $this->request->getFiles(), $this->request->getGet()->get("projectId"));
                        break;

                    case "deleteProject": // Si deleteProject on déclenche suppression article
                        $this->backController->deleteProject($this->request->getGet()->get("projectId"));
                        break;

                    case "addArticle": // Si addArticle on déclenche l'ajout d'un article
                        $this->backController->addArticle($this->request->getPost());
                        break;

                    case "editArticle": // Si editArticle on déclenche modification d'un article
                        $this->backController->editArticle($this->request->getPost(), $this->request->getGet()->get("articleId"));
                        break;

                    case "deleteArticle": // Si deleteArticle on déclenche suppression article
                        $this->backController->deleteArticle($this->request->getGet()->get("articleId"));
                        break;

                    case "addComment": // Si addComment ajoute commentaire
                        $this->frontController->addComment($this->request->getPost(), $this->request->getGet()->get("articleId"));
                        break;

                    case "flagComment": // Si flagComment signale commentaire
                        $this->frontController->flagComment($this->request->getGet()->get("commentId"));
                        break;

                    case "unflagComment": // Enlève le signalement d'un com via l'espace admin
                        $this->backController->unflagComment($this->request->getGet()->get("commentId"));
                        break;

                    case "deleteComment": // Si deleteComment supprime commentaire
                        $this->backController->deleteComment($this->request->getGet()->get("commentId"));
                        break;

                    case "register": // Si register alors on lance l'inscription
                        $this->frontController->register($this->request->getPost());
                        break;

                    case "login": // Connexion utilisateur
                        $this->frontController->login($this->request->getPost());
                        break;

                    case "logout": // Déconnexion utilisateur
                        $this->backController->logout();
                        break;

                    case "profile": // Accès profil utilisateur
                        $this->backController->profile();
                        break;

                    case "updatePassword": // Modif mot de passe utilisateur
                        $this->backController->updatePassword($this->request->getPost());
                        break;

                    case "deleteAccount": // Suppression compte utilisateur
                        $this->backController->deleteAccount();
                        break;

                    case "deleteUser": // Suppression utilisateur depuis espace admin
                        $this->backController->deleteUser($this->request->getGet()->get("userId"));
                        break;

                    case "administration": // Accès espace admin
                        $this->backController->administration();
                        break;

                    case "adminProjects": // Back gestion des projets
                        $this->backController->adminProjects();
                        break;

                    case "adminArticles": // Back gestion des articles
                        $this->backController->adminArticles();
                        break;

                    case "adminComments": // Back gestion des commentaires
                        $this->backController->adminComments();
                        break;

                    case "adminUsers": // Back gestion des utilisateurs
                        $this->backController->adminUsers();
                        break;

                    default: // Si la route est différente des précedentes alors error not found
                        $this->errorController->errorNotFound();
                }
            } else {
                $this->frontController->home(); // Si route pas set on charge l'accueil par défaut
            }
        } catch (Exception $e) {
            // $_SESSION["error"] = $e->getMessage();
            $this->errorController->errorServer();
        }
    }
}
