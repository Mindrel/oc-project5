<?php

// Connexion à la base de données

namespace Mich\Blog\src\DAO; // Permet d'éviter les collisions de classe (deux classes du même nom dans le même projet) en créant une zone spécifique à l'utilisation de cette classe (ne peut être utilisée ailleurs)

use PDO;
use Exception;

// Connexion à la base de données
abstract class DAO // Abstraite pour qu'on ne puisse pas l'instancier
{
    // Propriété qui va stocker via la méthode checkConnection() la connexion s'il y en a une (éviter les multiples reconnexions si plusieurs requêtes sur la même page)
    private $connection;

    // Vérifie si une connexion est déjà présente
    private function checkConnection()
    {
        // Vérifie si la connexion est nulle et fait appel à getConnection()
        if ($this->connection === null) {
            return $this->getConnection();
        }
        // Sinon si la connexion existe, elle est renvoyée, inutile de refaire une connexion
        return $this->connection;
    }

    // Méthode de connexion à la BDD
    private function getConnection()
    {
        // Tentative de connexion à la BDD
        try {
            $this->connection = new PDO(DB_HOST, DB_USER, DB_PASS, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET lc_time_names = 'fr_FR'"]); // Param de connexion se trouvent dans config/dev.php (ou prod.php) + Ajout SET lc_time_names FR sinon mois articles en anglais
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // On renvoie la connexion
            return $this->connection;
        } catch (Exception $errorConnection) { // On lève une erreur si la connexion échoue
            die("Erreur de connection : " . $errorConnection->getMessage());
        }
    }

    // Méthode qui fait appel à getConnection() et qui gère les requêtes (afin d'éviter les répétitions d'instanciations dans les classes des requêtes)
    protected function createQuery($sql, $parameters = null)
    {
        if ($parameters) {
            $result = $this->checkConnection()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->checkConnection()->query($sql);
        return $result;
    }

    // Méthode similaire à la précédente avec pagination en plus
    protected function createPaginationQuery($sql, $limit, $offset)
    {
        $result = $this->checkConnection()->prepare($sql);
        $result->execute();
        return $result;
    }
}
