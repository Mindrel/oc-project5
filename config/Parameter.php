<?php

// Classe permettant de centraliser les paramètres (POST GET SESSION)

namespace Mich\Blog\config;

class Parameter
{
    private $parameter;

    public function __construct($parameter)
    {
        $this->parameter = $parameter;
    }

    public function get($name)
    {
        if (isset($this->parameter[$name])) {
            return $this->parameter[$name];
        }
    }

    public function set($name, $value)
    {
        $this->parameter[$name] = $value;
    }

    // Permet de récupérer tous les paramètres
    public function all()
    {
        return $this->parameter;
    }
}
