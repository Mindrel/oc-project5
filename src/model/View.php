<?php

// Classe qui s'occupe de la gestion des vues 

namespace Mich\Blog\src\model;

use Mich\Blog\config\Request;

class View
{
    private $file;
    private $title;
    private $request;
    private $session;

    public function __construct()
    {
        $this->request = new Request();
        $this->session = $this->request->getSession();
    }

    // Génère la vue à partir du template et remplit la partie dynamique
    public function render($template, $data = [])
    {
        $this->file = "templates/" . $template . ".php";
        $content = $this->renderFile($this->file, $data);
        $view = $this->renderFile("templates/base.php", [
            "title" => $this->title,
            "content" => $content,
            "session" => $this->session
        ]);
        echo $view;
    }

    // Génère les données de la vue
    private function renderFile($file, $data)
    {
        if (file_exists($file)) {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        header("Location: index.php?route=notFound"); //Si page n'existe pas
    }
}
