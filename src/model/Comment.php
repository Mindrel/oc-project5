<?php

// Modèle comprenant toutes les propriétés et méthodes relatives aux comment (séparé de tout ce qui concerne la connexion à la bdd)

namespace Mich\Blog\src\model;

class Comment
{
    private $id;
    private $nickname;
    private $content;
    private $creationDate;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNickname()
    {
        return $this->nickname;
    }

    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }
}
