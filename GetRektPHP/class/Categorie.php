<?php

class Categorie {
    private $id;
    private $nom;

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

    public function setNom($value)
    {
        $this->nom = $value;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public static function getCategorieById($id) {
        $category = "categorie";

        return $category;
    }

}
