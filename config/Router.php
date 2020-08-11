<?php

// Routeur

namespace Mich\Blog\config;

use Exception;
use Mich\Blog\src\controller\FrontController;

class Router
{
    // Le constructor évite la répétition de l'instanciation (appelée avec $this ci-dessous)
    public function __construct()
    {
        $this->frontController = new FrontController();
    }

    public function run()
    {
        try {

            if (isset($_GET["route"])) {

                if ($_GET["route"] === "post") {
                    $this->frontController->post($_GET["postId"]);
                } else {
                    echo "page inconnue";
                }
            } else {
                $this->frontController->home();
            }
        } catch (Exception $e) {
            echo "erreur";
        }
    }
}
