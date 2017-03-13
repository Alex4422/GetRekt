<?php

namespace Model;

class Video {
    private $id;    
    private $titre;
    private $lien;
    private $image;
    private $dateDeCreation;
    private $description;
    private $user;
    private $categorie;


    function __construct()
    {

    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitre($value)
    {
        $this->titre = $value;
    }

    public function getTitre()
    {
        return $this->titre;
    }
    
    public function setLien($value)
    {
        $this->lien = $value;
    }

    public function getLien()
    {
        return $this->lien;
    }

    public function setDateDeCreation($value)
    {
        $this->dateDeCreation = $value;
    }

    public function getDateDeCreation()
    {
        return $this->dateDeCreation;
    }

    public function setImage($value)
    {
        $this->image = $value;
    }

    public function getImage()
    {
        return $this->image;
    }
    
    
    public function setDescription($value)
    {
        $this->description = $value;
    }

    public function getDescription()
    {
        return $this->description;
    }
    
    public function setUser($value)
    {
        $this->user = $value;
    }

    public function getUser()
    {
        return $this->user;
    }
    
    public function setCategorie($value)
    {
        $this->categorie = $value;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }
    
    public function validateFields($aArray) {
        
    }


}
