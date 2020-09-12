<?php

// Classe appelée par le contrôleur qui prend en paramètre les données à valider, et le nom de la classe que l'on veut valider

namespace Mich\Blog\src\constraint;

class Validation
{
    // Méthode appelée depuis le contrôleur et renvoie vers la classe concernée
    public function validate($data, $name)
    {
        if ($name === "Project") {
            $projectValidation = new ProjectValidation();
            $errors = $projectValidation->check($data);
            return $errors;
        }

        else if ($name === "Article") {
            $articleValidation = new ArticleValidation();
            $errors = $articleValidation->check($data);
            return $errors;
        }

        else if ($name === "Comment") {
            $commentValidation = new CommentValidation();
            $errors = $commentValidation->check($data);
            return $errors;
        }

        else if ($name === "User") {
            $userValidation = new UserValidation();
            $errors = $userValidation->check($data);
            return $errors;
        }
    }
}