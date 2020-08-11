<?php

require "../config/dev.php"; // On centralise l'appel aux paramètres de connexion à la bdd
require '../vendor/autoload.php'; // On centralise l'appel à l'autoloader. Celui-ci évite la répétitions des require. On l'appelle ici pour éviter de le require sur toutes les pages.


try {

    if (isset($_GET["route"])) {

        if ($_GET["route"] === "post") {
            require "../templates/single.php";
        } else {
            echo "page inconnue";
        }

    } else {
        require "../templates/home.php";
    }

} catch (Exception $e) {
    echo "Erreur";
}
