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

    public function check(Parameter $post)
    {
        foreach ($post->all() as $key => $value) {
            $this->checkField($key, $value);
        }
        return $this->errors;
    }

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

    private function addError($name, $error)
    {
        if ($error) {
            $this->errors += [
                $name => $error
            ];
        }
    }

    private function checkNickname($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank("nickname", $value);
        }

        if ($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength("nickname", $value, 2);
        }

        if ($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength("nickname", $value, 255);
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
