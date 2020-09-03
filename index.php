<?php

// Contrôleur frontal qui intercepte toutes les requêtes (il appelle le routeur)

require "config/dev.php"; // On centralise l'appel aux paramètres de connexion à la bdd (À REMPLACER PAR PROD.PHP LORS DE LA MISE EN PRODUCTION)
require "vendor/autoload.php"; // On centralise l'appel à l'autoloader. Celui-ci évite la répétitions des require. On l'appelle ici pour éviter de le require sur toutes les pages.

session_start();
$router = new \Mich\Blog\config\Router();
$router->run();
