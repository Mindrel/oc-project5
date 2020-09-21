<?php

namespace Mich\Blog\src\services;

use Mich\Blog\config\Parameter;

class UploadImage
{
    private $target_dir;
    public $target_file;
    public $uploadOk;
    private $imageFileType;
    public $errorUploadImage;

    public function __construct(Parameter $file) // On instancie Parameter pour get la superglobale $_FILES de Request
    {
        $this->file = $file;
        $this->target_dir = "public/img/upload/";
        $this->target_file = $this->target_dir . basename($this->file->get("name"));
        $this->imageFileType = strtolower(pathinfo($this->target_file, PATHINFO_EXTENSION));
        $this->run();
    }

    public function checkNotEmpty()
    {
        if (isset($_POST["submit"])) {
            $check = ($this->file->get("name"));
            if ($check == '') {
                $this->errorUploadImage = "Name file is empty.";
                $this->uploadOk = 0;
            } else {
                $this->uploadOk = 1;
            }
        }
    }

    // Vérification si vraie image 
    public function checkFakeImage()
    {
        if ($this->uploadOk == 1) {
            if (isset($_POST["submit"])) {
                $check = getimagesize($this->file->get("tmp_name"));
                if ($check !== false) {
                    $this->errorUploadImage = "File is an image - " . $check["mime"] . ".";
                    $this->uploadOk = 1;
                } else {
                    $this->errorUploadImage = "File is not an image.";
                    $this->uploadOk = 0;
                }
            }
        }
    }

    // Check if file already exists
    public function checkImageExists()
    {
        if ($this->uploadOk == 1) {
            if (file_exists($this->target_file)) {
                $this->errorUploadImage = "Sorry, file already exists.";
                $this->uploadOk = 0;
            }
        }
    }

    // Check file size
    public function checkFileSize()
    {
        if ($this->uploadOk == 1) {
            if ($this->file->get("size") > 500000) {
                $this->errorUploadImage = "Sorry, your file is too large.";
                $this->uploadOk = 0;
            }
        }
    }

    // Allow certain file formats
    public function allowFileFormats()
    {
        if ($this->uploadOk == 1) {
            if (
                $this->imageFileType != "jpg" && $this->imageFileType != "png" && $this->imageFileType != "jpeg"
                && $this->imageFileType != "gif"
            ) {
                $this->errorUploadImage = "<p>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
                $this->uploadOk = 0;
            }
        }
    }

    // Check if $uploadOk is set to 0 by an error
    public function uploadImage()
    {
        if ($this->uploadOk == 1) {
            if (!(move_uploaded_file($this->file->get("tmp_name"), $this->target_file))) {
                $this->uploadOk = 0;
                $this->errorUploadImage = "Sorry, there was an error uploading your file.";
            }
        }
    }

    public function run()
    {
        $this->checkNotEmpty();
        $this->checkFakeImage();
        $this->checkImageExists();
        $this->checkFileSize();
        $this->allowFileFormats();
        $this->uploadImage();
    }

    public function deleteUploadedImage()
    {
        if ($this->uploadOk === 1) {
            unlink($this->target_file);
        }
    }
}
