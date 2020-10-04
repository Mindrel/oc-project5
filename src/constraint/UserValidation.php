<?php

// Valide si seulement les données nouvel user sont conformes

namespace Mich\Blog\src\constraint;

use Mich\Blog\config\Parameter;

class UserValidation extends Validation
{
    private $errors = [];
    private $constraint;

    public function __construct()
    {
        $this->constraint = new Constraint();
    }

    // Méthode principale qui passe sur tous les paramètres et retourne array erreurs, utilisée dans Validation 
    public function check(Parameter $post)
    {
        foreach ($post->all() as $key => $value) {
            $this->checkField($key, $value);
        }
        return $this->errors;
    }

    // Contrôle les champs
    private function checkField($name, $value)
    {
        if ($name === "nickname") {
            $error = $this->checkNickname($name, $value);
            $this->addError($name, $error);
        } else if ($name === "pass") {
            $error = $this->checkPass($name, $value);
            $this->addError($name, $error);
        }
    }

    // Ajoute erreurs à l'array pour affichage plus tard
    private function addError($name, $error) {
        if ($error) {
            $this->errors += [
                $name => $error
            ];
        }
    }

    // Vérifie le pseudo
    private function checkNickname($name, $value) {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank("pseudo", $value);
        }

        if ($this->constraint->minLength($name, $value, 4)) {
            return $this->constraint->minLength("pseudo", $value, 4);
        }

        if ($this->constraint->maxLength($name, $value, 40)) {
            return $this->constraint->maxLength("pseudo", $value, 40);
        }
    }

    // Vérifie le mot de passe
    private function checkPass($name, $value) {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank("mot de passe", $value);
        }

        if ($this->constraint->minLength($name, $value, 6)) {
            return $this->constraint->minLength("mot de passe", $value, 6);
        }

        if ($this->constraint->maxLength($name, $value, 100)) {
            return $this->constraint->maxLength("mot de passe", $value, 100);
        }
    }
}