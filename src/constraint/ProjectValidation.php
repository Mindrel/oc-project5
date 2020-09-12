<?php

// Valide seulement si les données d'un projet sont conformes

namespace Mich\Blog\src\constraint;

use Mich\Blog\config\Parameter;

class ProjectValidation extends Validation
{
    private $errors = [];
    private $constraint;

    // Crée un nouvel objet basé sur la classe Constraint
    public function __construct()
    {
        $this->constraint = new Constraint();
    }

    // Récupère toutes les données de Parameter via la méthode all() et fait appel à checkField()
    public function check(Parameter $post)
    {
        foreach ($post->all() as $key => $value) {
            $this->checkField($key, $value);
        }
        return $this->errors;
    }

    // Vérifie chaque champ
    private function checkField($name, $value)
    {
        if ($name === "title") {
            $error = $this->checkTitle($name, $value);
            $this->addError($name, $error);
        } else if ($name === "content") {
            $error = $this->checkContent($name, $value);
            $this->addError($name, $error);
        }
    }

    // Ajoute une erreur si un des champs n'est pas valide
    private function addError($name, $error)
    {
        if ($error) {
            $this->errors += [
                $name => $error
            ];
        }
    }

    private function checkTitle($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank("titre", $value);
        }

        if ($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength("titre", $value, 2);
        }

        if ($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength("titre", $value, 255);
        }
    }

    private function checkContent($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank("contenu", $value);
        }

        if ($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength("contenu", $value, 2);
        }
    }
}
