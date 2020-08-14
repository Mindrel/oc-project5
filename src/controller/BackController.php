<?php

// Contrôleur qui gère la partie back (admin)

namespace Mich\Blog\src\controller;

use Mich\Blog\src\DAO\PostDAO;
use Mich\Blog\src\model\View;

class BackController
{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function addPost($post)
    {
        if (isset($post["submit"])) {
            $postDAO = new PostDAO();
            $postDAO->addPost($post);
            header("Location: ../public/index.php");
        }
        return $this->view->render("add_post", [
            "post" => $post
        ]);
    }
}
