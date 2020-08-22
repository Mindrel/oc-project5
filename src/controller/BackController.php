<?php

// Contrôleur qui gère la partie back (admin)

namespace Mich\Blog\src\controller;

use Mich\Blog\config\Parameter;

class BackController extends Controller
{
    // Ajout d'un article
    public function addArticle(Parameter $post)
    {
        if ($post->get("submit")) {
            $errors = $this->validation->validate($post, "Article"); // Processus de validation des données
            if (!$errors) {
                $this->articleDAO->addArticle($post);
                $this->session->set("add_article", "Le nouvel article a bien été ajouté");
                header("Location: ../public/index.php");
            }
            return $this->view->render("add_article", [
                "post" => $post,
                "errors" => $errors
            ]);
        }
        return $this->view->render("add_article");
    }

    // Modification d'un article
    public function editArticle(Parameter $post, $articleId)
    {
        $article = $this->articleDAO->getArticle($articleId); // Récupère d'abord le contenu de l'article

        if ($post->get("submit")) {
            $errors = $this->validation->validate($post, "Article");
            if (!$errors) {
                $this->articleDAO->editArticle($post, $articleId);
                $this->session->set("edit_article", "L'article a bien été modifié");
                header("Location: ../public/index.php");
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
    
    // Suppression d'un article
    public function deleteArticle($articleId)
    {
        $this->articleDAO->deleteArticle($articleId);
        $this->session->set("delete_article", "L'article a bien été supprimé");
        header("Location: ../public/index.php");
    }

    // Suppression d'un commentaire
    public function deleteComment($commentId)
    {
        $this->commentDAO->deleteComment($commentId);
        $this->session->set("delete_comment", "Le commentaire a bien été supprimé");
        header("Location: ../public/index.php");
    }

    // Accès au profil utilisateur
    public function profile()
    {
        return $this->view->render("profile");
    }

    // Changement du mot de passe utilisateur
    public function updatePassword(Parameter $post)
    {
        if ($post->get("submit")) {
            $this->userDAO->updatePassword($post, $this->session->get("nickname"));
            $this->session->set("update_password", "Le mot de passe a été mis à jour");
            header("Location: ../public/index.php?route=profile");
        }
        return $this->view->render("update_password");
    }

    // Déconnexion utilisateur
    public function logout()
    {
        $this->session->stop();
        $this->session->start();
        $this->session->set("logout", "À bientôt !");
        header("Location: ../public/index.php");
    }
}
