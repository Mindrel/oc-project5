<?php

// Requêtes relatives aux articles

namespace Mich\Blog\src\DAO; // Permet d'éviter les collisions de classe (deux classes du même nom dans le même projet) en créant une zone spécifique à l'utilisation de cette classe (ne peut être utilisée ailleurs)

use Mich\Blog\src\model\Article;
use Mich\Blog\config\Parameter;

class ArticleDAO extends DAO
{
    // Permet de convertir chaque champ de la table en propriété de l'objet
    private function buildObject($row)
    {
        $article = new Article();
        $article->setId($row["id"]);
        $article->setTitle($row["title"]);
        $article->setContent($row["content"]);
        $article->setAuthor($row["author"]);
        $article->setCreationDate($row["creation_date"]);
        return $article;
    }

    // Récupère tous les articles
    public function getArticles()
    {
        $sql = "SELECT id, title, content, author, creation_date FROM p5_article ORDER BY id DESC";
        $result = $this->createQuery($sql);
        $articles = [];
        foreach ($result as $row) {
            $articleId = $row["id"];
            $articles[$articleId] = $this->buildObject($row); // Pour renvoyer des objets de la classe Article
        }
        $result->closeCursor(); // Evite un max l'utilisation de php dans la vue
        return $articles;
    }

    // Récupère un seul article
    public function getArticle($articleId)
    {
        $sql = "SELECT id, title, content, author, creation_date FROM p5_article WHERE id = ?";
        $result = $this->createQuery($sql, [$articleId]);
        $article = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($article);
    }

    // Ajout d'un article
    public function addArticle(Parameter $post)
    {
        $sql = "INSERT INTO p5_article (title, content, author, creation_date) VALUES (?, ?, ?, NOW())";
        $this->createQuery($sql, [$post->get("title"), $post->get("content"), $post->get("author")]);
    }

    // Modification d'un article
    public function editArticle(Parameter $post, $articleId)
    {
        $sql = "UPDATE p5_article SET title=:title, content=:content, author=:author WHERE id=:articleId";
        $this->createQuery($sql, [
            "title" => $post->get("title"),
            "content" => $post->get("content"),
            "author" => $post->get("author"),
            "articleId" => $articleId
        ]);
    }

    // Suppression d'un article et des commentaires associés
    public function deleteArticle($articleId)
    {
        $sql = "DELETE FROM p5_comment WHERE article_id = ?";
        $this->createQuery($sql, [$articleId]);
        $sql = "DELETE FROM p5_article WHERE id = ?";
        $this->createQuery($sql, [$articleId]);
    }
}
