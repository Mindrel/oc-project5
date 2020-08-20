<?php

// Modèle comprenant toutes les propriétés et méthodes relatives à l'User

namespace Mich\Blog\src\model;

class User
{
    private $id;
    private $nickname;
    private $pass;
    private $creationDate;

    public function getId()
    {
        return $this->id;
    }

    public function setId()
    {
        $this->id = $id;
    }

    public function getNickname()
    {
        return $this->nickname;
    }

    public function setNickname()
    {
        $this->nickname = $nickname;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function setPass()
    {
        $this->pass = $pass;
    }

    public function getCreationDate()
    {
        return $this->$creationDate;
    }

    public function setCreationDate()
    {
        $this->creationDate = $creationDate;
    }
}
