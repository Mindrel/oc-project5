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
}
