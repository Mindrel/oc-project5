<?php

// Contient les contraintes de validation

namespace Mich\Blog\src\constraint;

class Constraint
{
    // Si champ vide renvoie un message
    public function notBlank($name, $value)
    {
        if (empty($value)) {
            return '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Le champ ' . $name . ' est vide</p>';
        }
    }

    // Si pas assez de caractères renvoie un message
    public function minLength($name, $value, $minSize)
    {
        if (strlen($value) < $minSize) {
            return '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Le champ ' . $name . ' doit contenir au moins ' . $minSize . ' caractères</p>';
        }
    }

    // Si trop de caractères renvoie un message
    public function maxLength($name, $value, $maxSize)
    {
        if (strlen($value) > $maxSize) {
            return '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Le champ ' . $name . ' doit contenir au maximum ' . $maxSize . ' caractères</p>';
        }
    }

    // Si format URL non respecté renvoie un message
    public function urlFormat($name, $value)
    {
        if (!(filter_var($value, FILTER_VALIDATE_URL))) {
            return '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Le champ ' . $name . ' ne correspond pas au format URL</p>';
        }
    }
}