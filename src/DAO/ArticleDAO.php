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
        $article->setAuthor($row["nickname"]);
        $article->setCreationDate($row["creation_date"]);
        $article->setTimeTag($row["time_tag"]);
        return $article;
    }
     
    // Récupère tous les articles
    public function getArticles()
    {
        $sql = "SELECT p5_article.id, p5_article.title, LEFT(p5_article.content, 500) AS content, p5_user.nickname, DATE_FORMAT(p5_article.creation_date, '%M %Y') AS creation_date, DATE_FORMAT(p5_article.creation_date, '%Y-%m-%dT%H:%i') AS time_tag FROM p5_article INNER JOIN p5_user ON p5_article.user_id = p5_user.id ORDER BY p5_article.id DESC";
        $result = $this->createQuery($sql);
        $articles = [];
        foreach ($result as $row) {
            $articleId = $row["id"];
            $articles[$articleId] = $this->buildObject($row); // Pour renvoyer des objets de la classe Article
        }
        $result->closeCursor(); // Evite un max l'utilisation de php dans la vue
        return $articles;
    }

    // Récupère le dernier article
    public function getLatestArticle()
    {
        $sql = "SELECT p5_article.id, p5_article.title, LEFT(p5_article.content, 500) AS content, p5_user.nickname, DATE_FORMAT(p5_article.creation_date, '%M %Y') AS creation_date, DATE_FORMAT(p5_article.creation_date, '%Y-%m-%dT%H:%i') AS time_tag FROM p5_article INNER JOIN p5_user ON p5_article.user_id = p5_user.id WHERE p5_article.id = (SELECT MAX(p5_article.id) FROM p5_article)";
        $result = $this->createQuery($sql);
        $latestArticle = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($latestArticle);
    }   

    // Récupère un seul article
    public function getArticle($articleId)
    {
        $sql = "SELECT p5_article.id, p5_article.title, p5_article.content, p5_user.nickname, DATE_FORMAT(p5_article.creation_date, '%M %Y') AS creation_date, DATE_FORMAT(p5_article.creation_date, '%Y-%m-%dT%H:%i') AS time_tag FROM p5_article INNER JOIN p5_user ON p5_article.user_id = p5_user.id WHERE p5_article.id = ?";
        $result = $this->createQuery($sql, [$articleId]);
        $article = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($article);
    }

    // Ajout d'un article
    public function addArticle(Parameter $post, $userId)
    {
        $sql = "INSERT INTO p5_article (title, content, creation_date, user_id) VALUES (?, ?, NOW(), ?)";
        $this->createQuery($sql, [$post->get("title"), $post->get("content"), $userId]);
    }

    // Modification d'un article
    public function editArticle(Parameter $post, $articleId, $userId)
    {
        $sql = "UPDATE p5_article SET title = :title, content = :content, user_id = :user_id WHERE id = :articleId";
        $this->createQuery($sql, [
            "title" => $post->get("title"),
            "content" => $post->get("content"),
            "user_id" => $userId,
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
