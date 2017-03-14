<?php

namespace Model;
use Lib as Lib;

class Categorie {
    private $id;
    private $nom;
    private $ajax;

    function __construct()
    {
        
        $this->ajax = new Lib\Ajax("categorie");
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
    
    
    public function validateFields($aArray) {
        $aReturn = array(
            "valid" => true,
            "data" => array()
        );
        foreach ($aArray as $key => $value) {
            $indexKey = $value['name'];
            
            if (empty($value['value'])) {
                $aReturn['valid'] = false;
                $aReturn['message'] = "Veuillez remplir tous les champs";
                return $aReturn;                
            }
            
            $aReturn['data'][$indexKey] = $value['value'];
            
        }
        return $aReturn;
    }
    
    public function createCategorie($aArray) {
        return $this->ajax->post("", $aArray);
    }

    public static function getCategorieById($id) {
        $category = "categorie";

        return $category;
    }

    public function getAllCategorie() {
        return $this->ajax->get();
    }
}
