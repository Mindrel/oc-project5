<?php

// Classe qui va permettre de gérer la requête (via le router notamment)

namespace Mich\Blog\config;

class Request
{
    private $get;
    private $post;
    private $files;
    private $session;

    public function __construct()
    {
        $this->get = new Parameter($_GET);
        $this->post = new Parameter($_POST);
        $this->files = new Parameter($_FILES);
        $this->session = new Session($_SESSION);
    }

    public function getGet()
    {
        return $this->get;
    }

    public function getPost()
    {
        return $this->post;
    }

    public function getFiles()
    {
        return $this->files;
    }

    public function getSession()
    {
        return $this->session;
    }
}
