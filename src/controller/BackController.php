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
            $this->articleDAO->addArticle($post);
            $this->session->set("add_article", "Le nouvel article a bien été ajouté");
            header("Location: ../public/index.php");
        }
        return $this->view->render("add_article", [
            "post" => $post
        ]);
    }

    // Modification d'un article
    public function editArticle(Parameter $post, $articleId)
    {
        $article = $this->articleDAO->getArticle($articleId); // Récupère d'abord le contenu de l'article

        if ($post->get("submit")) {
            $this->articleDAO->editArticle($post, $articleId);
            $this->session->set("edit_article", "L'article a bien été modifié");
            header("Location: ../public/index.php");
        }
        return $this->view->render("edit_article", [
            "article" => $article
        ]);
    }
}
