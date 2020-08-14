<?php

// Contrôleur qui gère la partie back (admin)

namespace Mich\Blog\src\controller;

class BackController extends Controller
{
    public function addPost($post)
    {
        if (isset($post["submit"])) {
            $this->postDAO->addPost($post);
            header("Location: ../public/index.php");
        }
        return $this->view->render("add_post", [
            "post" => $post
        ]);
    }
}
