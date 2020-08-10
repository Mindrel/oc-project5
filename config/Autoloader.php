<?php

// L'autoloader permet d'éviter les répétitions de require et include 

namespace Mich\Blog\config;

class Autoloader
{   
    // Crée une file d'attente de fonctions d'autochargement et les exécute les unes après les autres dans l'ordre où elles ont été définies
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']); 
    }

    public static function autoload($class)
    {
        $class = str_replace('Mich\Blog', '', $class);
        $class = str_replace('\\', '/', $class);
        require "../" . $class . ".php";
    }
}
