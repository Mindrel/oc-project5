<?php

// Classe qui s'occupe de la gestion des vues 

namespace Mich\Blog\src\model;

class View
{
    private $file;
    private $title;

    // Génère la vue
    public function render($template, $data = [])
    {
        $this->file = "../templates/" . $template . ".php";
        $content = $this->renderFile($this->file, $data);
        $view = $this->renderFile("../templates/base.php", [
            "title" => $this->title,
            "content" => $content
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
