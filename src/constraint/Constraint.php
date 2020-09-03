<?php

// Contient les contraintes de validation

namespace Mich\Blog\src\constraint;

class Constraint
{
    public function notBlank($name, $value)
    {
        if (empty($value)) {
            return '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Le champ ' . $name . ' est vide</p>';
        }
    }

    public function minLength($name, $value, $minSize)
    {
        if (strlen($value) < $minSize) {
            return '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Le champ ' . $name . ' doit contenir au moins ' . $minSize . ' caractères</p>';
        }
    }

    public function maxLength($name, $value, $maxSize)
    {
        if (strlen($value) > $maxSize) {
            return '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Le champ ' . $name . ' doit contenir au maximum ' . $maxSize . ' caractères</p>';
        }
    }
}