<?php

namespace Mich\Blog\src\services;

use Mich\Blog\config\Parameter;

class UploadImage
{
    private $targetDir;
    public $targetFile;
    public $uploadOk;
    private $imageFileType;
    public $errorUploadImage;

    public function __construct(Parameter $file) // On instancie Parameter pour get la superglobale $_FILES de Request
    {
        $this->file = $file;
        $this->targetDir = "public/img/upload/";
        $this->targetFile = $this->targetDir . basename($this->file->get("name"));
        $this->imageFileType = strtolower(pathinfo($this->targetFile, PATHINFO_EXTENSION));
        $this->runUploadProcess();
    }

    // Vérif si fichier bien présent
    public function checkNotEmpty()
    {
        if (isset($_POST["submit"])) {
            $check = ($this->file->get("name"));
            if ($check == '') {
                $this->errorUploadImage = '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Le nom du fichier est vide</p>';
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
                    $this->uploadOk = 1;
                } else {
                    $this->errorUploadImage = '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Le fichier "' . basename($this->file->get("name")) . '" n\'est pas une image</p>';
                    $this->uploadOk = 0;
                }
            }
        }
    }

    // Vérifie si l'image existe déjà dans le répertoire
    public function checkImageExists()
    {
        if ($this->uploadOk == 1) {
            if (file_exists($this->targetFile)) {
                $this->errorUploadImage = '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Le fichier "' . basename($this->file->get("name")) . '" existe déjà</p>';
                $this->uploadOk = 0;
            }
        }
    }

    // Vérifie que l'image ne dépasse pas une certaine date
    public function checkFileSize()
    {
        if ($this->uploadOk == 1) {
            if ($this->file->get("size") > 500000) {
                $this->errorUploadImage = '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Le fichier "' . basename($this->file->get("name")) . '" est trop lourd</p>';
                $this->uploadOk = 0;
            }
        }
    }

    // N'autorise que certains formats de fichiers
    public function allowFileFormats()
    {
        if ($this->uploadOk == 1) {
            if ($this->imageFileType != "jpg" && $this->imageFileType != "png" && $this->imageFileType != "jpeg") {
                $this->errorUploadImage = '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Le fichier "' . basename($this->file->get("name")) . '" n\'est ni un jpg/jpeg, ni un png.</p>';
                $this->uploadOk = 0;
            }
        }
    }

    // Si l'upload échoue on remets uploadOk à 0 et message d'erreur
    public function uploadImage()
    {
        if ($this->uploadOk == 1) {
            if (!(move_uploaded_file($this->file->get("tmp_name"), $this->targetFile))) {
                $this->uploadOk = 0;
                $this->errorUploadImage = '<p class="error-message"><i class="fas fa-exclamation-circle"></i>Erreur : l\'upload du fichier "' . basename($this->file->get("name")) . '" n\'a pas abouti</p>';
            }
        }
    }

    // Méthode nécessaire pour lancer le process de vérification puis l'upload si OK (depuis le constructeur)
    public function runUploadProcess()
    {
        $this->checkNotEmpty();
        $this->checkFakeImage();
        $this->checkImageExists();
        $this->checkFileSize();
        $this->allowFileFormats();
        $this->uploadImage();
    }

    // Méthode supplémentaire utilisée dans le controller pour supprimer l'image dont l'upload a réussi, si l'autre est en erreur
    public function deleteUploadedImage()
    {
        if ($this->uploadOk === 1) {
            unlink($this->targetFile);
        }
    }
}
