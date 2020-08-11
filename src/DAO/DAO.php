<?php

namespace Mich\Blog\src\DAO; // Permet d'éviter les collisions de classe (deux classes du même nom dans le même projet) en créant une zone spécifique à l'utilisation de cette classe (ne peut être utilisée ailleurs)

use PDO; // Nécessaire sans quoi le namespace bloque l'accès à cet objet
use Exception; // Nécessaire sans quoi le namespace bloque l'accès à cet objet

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
            $this->connection = new PDO(DB_HOST, DB_USER, DB_PASS); // Param de connexion se trouvent dans config/dev.php 
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // On renvoie la connexion
            return $this->connection;
        } catch (Exception $errorConnection) { // On lève une erreur si la connexion échoue
            die("Erreur de connection : " . $errorConnection->getMessage());
        }
    }

    // Méthode qui fait appel à getConnection() et qui gère les requêtes (afin d'éviter les répétitions d'instanciations dans les classes des requêtes)
    protected function createQuery($sql, $parameters = null) // (param : requête sql, paramètres qui valent null par défaut)
    {
        // S'il s'agit d'une requête préparée il est nécessaire de préciser les paramètres
        if ($parameters) {
            $result = $this->checkConnection()->prepare($sql);
            $result->setFetchMode(PDO::FETCH_CLASS, get_called_class()); // setFetchMode() définit le mode de récupération par défaut de fetch() (ici ça retourne une instance car constante FETCH_CLASS) et get_called_class() permet de récupérer le nom de la classe depuis laquelle une méthode a été appelée.
            $result->execute($parameters);
            return $result;
        }
        // par défaut il n'y a pas de paramètres pour une requête query
        $result = $this->checkConnection()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, static::class); // static::class même rôle que get_called_class(), c'est pour l'exemple.
        return $result;
    }
}
