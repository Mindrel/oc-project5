<?php

// Valide seulement si les données du commentaire sont conformes

namespace Mich\Blog\src\constraint;

use Mich\Blog\config\Parameter;

class CommentValidation extends Validation
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
        } else if ($name === "content") {
            $error = $this->checkContent($name, $value);
            $this->addError($name, $error);
        }
    }

    // Ajoute erreurs à l'array pour affichage plus tard
    private function addError($name, $error)
    {
        if ($error) {
            $this->errors += [
                $name => $error
            ];
        }
    }

    // Vérifie le pseudo
    private function checkNickname($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank("pseudo", $value);
        }

        if ($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength("pseudo", $value, 2);
        }

        if ($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength("pseudo", $value, 255);
        }
    }

    // Vérifie le contenu principal
    private function checkContent($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank("message", $value);
        }

        if ($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength("message", $value, 2);
        }
    }
}
