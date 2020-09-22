<?php

// Contrôleur qui gère la partie back (admin)

namespace Mich\Blog\src\controller;

use Mich\Blog\config\Parameter;
use Mich\Blog\src\services\UploadImage;

class BackController extends Controller
{
    // Vérifie si utilisateur est connecté
    private function checkLoggedIn()
    {
        if (!$this->session->get("nickname")) {
            $this->session->set("need_login", '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Vous devez vous connecter pour accéder à cette page</p>');
            header("Location: index.php?route=login");
        } else {
            return true;
        }
    }

    // Vérifie si utilisateur connecté est admin
    private function checkAdmin()
    {
        $this->checkLoggedIn();
        if (!($this->session->get("role") === "admin")) {
            $this->session->set("not_admin", '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Vous n\'avez rien à faire sur cette page petit coquinou &#128536;</p>');
            header("Location: index.php?route=profile");
        } else {
            return true;
        }
    }

    // Accès hub central espace admin 
    public function administration()
    {
        if ($this->checkAdmin()) {
            return $this->view->render("administration");
        }
    }

    // Accès au back des projets
    public function adminProjects()
    {
        if ($this->checkAdmin()) {
            $projects = $this->projectDAO->getProjects();

            return $this->view->render("admin_projects", [
                "projects" => $projects
            ]);
        }
    }

    // Accès au back des articles
    public function adminArticles()
    {
        if ($this->checkAdmin()) {
            $articles = $this->articleDAO->getArticles();

            return $this->view->render("admin_articles", [
                "articles" => $articles
            ]);
        }
    }

    // Accès au back des commentaires
    public function adminComments()
    {
        if ($this->checkAdmin()) {
            $comments = $this->commentDAO->getComments();

            return $this->view->render("admin_comments", [
                "comments" => $comments
            ]);
        }
    }

    // Accès au back des projets
    public function adminUsers()
    {
        if ($this->checkAdmin()) {
            $users = $this->userDAO->getUsers();

            return $this->view->render("admin_users", [
                "users" => $users
            ]);
        }
    }

    // Ajout d'un projet
    public function addProject(Parameter $post, Parameter $files)
    {
        if ($this->checkAdmin()) {
            if ($post->get("submit")) {
                $errors = $this->validation->validate($post, "Project"); // Processus de validation des données

                // Si pas d'erreur de validation des champs text on passe à l'upload image
                if (!$errors) {
                    $imageLogo = new UploadImage(new Parameter($files->get("logo")));
                    $imageThumbnail = new UploadImage(new Parameter($files->get("thumbnail")));

                    if ($imageLogo->uploadOk === 1) {
                        $post->logo = $imageLogo->targetFile;
                    }

                    if ($imageThumbnail->uploadOk === 1) {
                        $post->thumbnail = $imageThumbnail->targetFile;
                    }
                    // Si upload logo échec on ajoute l'erreur dans l'array errors et delete thumb (pour éviter erreur réupload même image thumb)
                    if ($imageLogo->uploadOk === 0) {
                        $errors += ["logo" => $imageLogo->errorUploadImage];
                        $imageThumbnail->deleteUploadedImage();
                    }
                    // Idem ci-dessus mais pour thumbnail
                    if ($imageThumbnail->uploadOk === 0) {
                        $errors += ["thumbnail" => $imageThumbnail->errorUploadImage];
                        $imageLogo->deleteUploadedImage();
                    }
                }

                // Si pas d'erreur on lance la requête
                if (!$errors) {
                    $this->projectDAO->addProject($post, $files);
                    $this->session->set("add_project", '<p class="check-message"><i class="fas fa-check-circle"></i>Le nouveau projet a bien été ajouté</p>');
                    header("Location: index.php?route=adminProjects");
                }
                return $this->view->render("add_project", [
                    "post" => $post,
                    "errors" => $errors
                ]);
            }
            return $this->view->render("add_project");
        }
    }

    // Modification d'un projet
    public function editProject(Parameter $post, Parameter $files, $projectId)
    {
        if ($this->checkAdmin()) {
            $project = $this->projectDAO->getProject($projectId); // Récupère d'abord le contenu du projet

            if ($post->get("submit")) {
                $errors = $this->validation->validate($post, "Project");
                
                if (!$errors) {
                    $imageLogo = new UploadImage(new Parameter($files->get("logo")));
                    $imageThumbnail = new UploadImage(new Parameter($files->get("thumbnail")));

                    if ($imageLogo->uploadOk === 1) {
                        $post->logo = $imageLogo->targetFile;
                    }

                    if ($imageThumbnail->uploadOk === 1) {
                        $post->thumbnail = $imageThumbnail->targetFile;
                    }
                        
                    if ($imageLogo->uploadOk === 0) {
                        $errors += ["logo" => $imageLogo->errorUploadImage];
                        $imageThumbnail->deleteUploadedImage();
                    }

                    if ($imageThumbnail->uploadOk === 0) {
                        $errors += ["thumbnail" => $imageThumbnail->errorUploadImage];
                        $imageLogo->deleteUploadedImage();
                    }
                }

                if (!$errors) {
                    $this->projectDAO->editProject($post, $files, $projectId);
                    $this->session->set("edit_project", '<p class="check-message"><i class="fas fa-check-circle"></i>Le projet a bien été modifié</p>');
                    header("Location: index.php?route=adminProjects");
                }
                return $this->view->render("edit_project", [
                    "post" => $post,
                    "errors" => $errors
                ]);
            }
            $post->set("id", $project->getId());
            $post->set("title", $project->getTitle());
            $post->set("content", $project->getContent());
            $post->set("logo", $project->getLogo());
            $post->set("thumbnail", $project->getThumbnail());
            $post->set("website", $project->getWebsite());

            return $this->view->render("edit_project", [
                "post" => $post
            ]);
        }
    }

    // Suppression d'un projet
    public function deleteProject($projectId)
    {
        if ($this->checkAdmin()) {
            $this->projectDAO->deleteProject($projectId);
            $this->session->set("delete_project", '<p class="check-message"><i class="fas fa-check-circle"></i>Le projet a bien été supprimé</p>');
            header("Location: index.php?route=adminProjects");
        }
    }

    // Ajout d'un article
    public function addArticle(Parameter $post)
    {
        if ($this->checkAdmin()) {
            if ($post->get("submit")) {
                $errors = $this->validation->validate($post, "Article"); // Processus de validation des données
                if (!$errors) {
                    $this->articleDAO->addArticle($post, $this->session->get("id")); // 2ème param récup id de l'user connecté (admin)
                    $this->session->set("add_article", '<p class="check-message"><i class="fas fa-check-circle"></i>Le nouvel article a bien été ajouté</p>');
                    header("Location: index.php?route=adminArticles");
                }
                return $this->view->render("add_article", [
                    "post" => $post,
                    "errors" => $errors
                ]);
            }
            return $this->view->render("add_article");
        }
    }

    // Modification d'un article
    public function editArticle(Parameter $post, $articleId)
    {
        if ($this->checkAdmin()) {
            $article = $this->articleDAO->getArticle($articleId); // Récupère d'abord le contenu de l'article

            if ($post->get("submit")) {
                $errors = $this->validation->validate($post, "Article");
                if (!$errors) {
                    $this->articleDAO->editArticle($post, $articleId, $this->session->get("id")); // 3ème param récup id user connecté (admin)
                    $this->session->set("edit_article", '<p class="check-message"><i class="fas fa-check-circle"></i>L\'article a bien été modifié</p>');
                    header("Location: index.php?route=adminArticles");
                }
                return $this->view->render("edit_article", [
                    "post" => $post,
                    "errors" => $errors
                ]);
            }
            $post->set("id", $article->getId());
            $post->set("title", $article->getTitle());
            $post->set("content", $article->getContent());
            $post->set("author", $article->getAuthor());

            return $this->view->render("edit_article", [
                "post" => $post
            ]);
        }
    }

    // Suppression d'un article
    public function deleteArticle($articleId)
    {
        if ($this->checkAdmin()) {
            $this->articleDAO->deleteArticle($articleId);
            $this->session->set("delete_article", '<p class="check-message"><i class="fas fa-check-circle"></i>L\'article a bien été supprimé</p>');
            header("Location: index.php?route=adminArticles");
        }
    }

    // Suppression d'un commentaire
    public function deleteComment($commentId)
    {
        if ($this->checkAdmin()) {
            $this->commentDAO->deleteComment($commentId);
            $this->session->set("delete_comment", '<p class="check-message"><i class="fas fa-check-circle"></i>Le commentaire a bien été supprimé</p>');
            header("Location: index.php?route=adminComments");
        }
    }

    // Enlève le signalement commentaire via l'espace admin
    public function unflagComment($commentId)
    {
        if ($this->checkAdmin()) {
            $this->commentDAO->unflagComment($commentId);
            $this->session->set("unflag_comment", '<p class="check-message"><i class="fas fa-check-circle"></i>Le commentaire n\'est plus signalé</p>');
            header("Location: index.php?route=adminComments");
        }
    }

    // Accès au profil utilisateur
    public function profile()
    {
        if ($this->checkLoggedIn()) {
            return $this->view->render("profile");
        }
    }

    // Changement du mot de passe utilisateur
    public function updatePassword(Parameter $post)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get("submit")) {
                $this->userDAO->updatePassword($post, $this->session->get("nickname"));
                $this->session->set("update_password", '<p class="check-message"><i class="fas fa-check-circle"></i>Le mot de passe a été mis à jour</p>');
                header("Location: index.php?route=profile");
            }
            return $this->view->render("update_password");
        }
    }

    // Déconnexion utilisateur
    public function logout()
    {
        if ($this->checkLoggedIn()) {
            $this->logoutOrDelete("logout");
        }
    }

    // Suppression compte utilisateur
    public function deleteAccount()
    {
        if ($this->checkLoggedIn()) {
            $this->userDAO->deleteAccount($this->session->get("nickname"));
            $this->logoutOrDelete("delete_account");
        }
    }

    // Méthodes logout() et deleteAccount() similaires, évite la répétition de code dans ces deux méthodes
    private function logoutOrDelete($param)
    {
        $this->session->stop();
        $this->session->start();
        if ($param === "logout") {
            $this->session->set($param, '<p class="check-message"><i class="fas fa-check-circle"></i>Vous êtes déconnecté. À bientôt j\'espère !</p>');
        } else {
            $this->session->set($param, '<p class="check-message"><i class="fas fa-check-circle"></i>Votre compte a bien été supprimé</p>');
        }
        header("Location: index.php?route=blog");
    }

    // Suppression utilisateur depuis espace admin
    public function deleteUser($userId)
    {
        if ($this->checkAdmin()) {
            $this->userDAO->deleteUser($userId);
            $this->session->set("delete_user", '<p class="check-message"><i class="fas fa-check-circle"></i>L\'utilisateur a bien été supprimé</p>');
            header("Location: index.php?route=adminUsers");
        }
    }
}
