<?php 

// Classe qui gère la session utilisateur

namespace Mich\Blog\config;

class Session
{
    private $session;

    public function __construct($session)
    {
        $this->session = $session;
    }

    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function get($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }

    // Permet l'affichage d'avertissements dans les vues après opérations
    public function show($name)
    {
        if (isset($_SESSION[$name])) {
            $key = $this->get($name);
            $this->remove($name);
            return $key;
        }
    }

    // Détruit la variable session
    public function remove($name)
    {
        unset($_SESSION[$name]);
    }

    // Nécessaire pour message déco utilisateur car déco stop session (session start dans l'index en temps normal)
    public function start()
    {
        session_start();
    }
    
    // Nécessaire pour déco utilisateur
    public function stop()
    {
        session_destroy();
    }
}