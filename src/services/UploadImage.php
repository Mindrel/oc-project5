<?php

namespace Mich\Blog\src\services;

use Mich\Blog\config\Parameter;

class UploadImage
{
    private $target_dir;
    private $target_file;
    private $uploadOk;
    private $imageFileType;

    public function __construct(Parameter $file) // On instancie Parameter pour get la superglobale $_FILES de Request
    {
        $this->file = $file;
        $this->target_dir = "public/img/upload/";
        $this->target_file = $this->target_dir . basename($this->file->get("name"));
        // $this->uploadOk = 0;
        $this->imageFileType = strtolower(pathinfo($this->target_file, PATHINFO_EXTENSION));
        $this->run();
    }

    // Vérification si vraie image 
    public function checkFakeImage()
    {
        if (isset($_POST["submit"])) {
            $check = getimagesize($this->file->get("tmp_name"));
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $this->uploadOk = 1;
            } else {
                echo "File is not an image.";
                $this->uploadOk = 0;
            }
        }
    }

    // Check if file already exists
    public function checkImageExists()
    {
        if (file_exists($this->target_file)) {
            echo "Sorry, file already exists.";
            $this->uploadOk = 0;
        }
    }

    // Check file size
    public function checkFileSize()
    {
        if ($this->file->get("size") > 500000) {
            echo "Sorry, your file is too large.";
            $this->uploadOk = 0;
        }
    }

    // Allow certain file formats
    public function allowFileFormats()
    {
        if (
            $this->imageFileType != "jpg" && $this->imageFileType != "png" && $this->imageFileType != "jpeg"
            && $this->imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $this->uploadOk = 0;
        }
    }

    // Check if $uploadOk is set to 0 by an error
    public function uploadImage()
    {
        if ($this->uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($this->file->get("tmp_name"), $this->target_file)) {
                echo "The file " . basename($this->file->get("name")) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    public function run()
    {
        $this->checkFakeImage();
        $this->checkImageExists();
        $this->checkFileSize();
        $this->allowFileFormats();
        $this->uploadImage();
    }
}