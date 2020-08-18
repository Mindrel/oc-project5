<?php

// Classe appelée par le contrôleur qui prend en paramètre les données à valider, et le nom de la classe que l'on veut valider

namespace Mich\Blog\src\constraint;

class Validation
{
    // Méthode appelée depuis le contrôleur et renvoie vers la classe ArticleValidation
    public function validate($data, $name)
    {
        if ($name === "Article") {
            $articleValidation = new ArticleValidation();
            $errors = $articleValidation->check($data);
            return $errors;
        }
    }
}