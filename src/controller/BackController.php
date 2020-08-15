<?php

// Contrôleur qui gère la partie back (admin)

namespace Mich\Blog\src\controller;

use Mich\Blog\config\Parameter;

class BackController extends Controller
{   
    // Ajout d'un post
    public function addPost(Parameter $post)
    {
        if ($post->get("submit")) {
            $this->postDAO->addPost($post);
            $this->session->set("add_post", "Le nouveau post a bien été ajouté");
            header("Location: index.php");
        }
        return $this->view->render("add_post", [
            "post" => $post
        ]);
    }

    // Modification d'un post
    public function editPost(Parameter $post, $postId)
    {
        $article = $this->postDAO->getPost($postId); // Récupère d'abord le contenu du post

        if ($post->get("submit")) {
            $this->postDAO->editPost($post, $postId);
            $this->session->set("edit_post", "Le post a bien été modifié");
            header("Location: index.php");
        }
        return $this->view->render("edit_post", [
            "post" => $article
        ]);
    }
}
