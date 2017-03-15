<?php

namespace Model;
use Lib as Lib;

class User {
    //put your code here
    private $id;
    private $pseudo;
    private $motDePasse;
    private $administrateur;
    private $dateDeCreation;
    private $email;
    private $ajax;

    function __construct()
    {
        $this->ajax = new Lib\Ajax("users");
    }
    
    public function setId($value)
    {
        $this->id = $value;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setMotDePasse($password)
    {
        $this->motDePasse = $password;
    }

    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    public function setAdministrateur($value)
    {
        $this->administrateur = $value;
    }

    public function getAdministrateur()
    {
        return $this->administrateur;
    }
    
    public function setDateDeCreation($value)
    {
        $this->dateDeCreation = $value;
    }

    public function getDateDeCreation()
    {
        return $this->dateDeCreation;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function getAll() {
        
    }
    
    public function getById() {
        
    }
    
    public function existUser($ajax, $aArray) {
        return $ajax->post("exist", $aArray);
    }
    
    public function createUser($aArray) {        
        return $this->ajax->post("", $aArray);
    }
    
    public function connect($ajax, $aArray) {
        $aReturn = array(
            "valid" => true,
            "message" => "",
            "data" => array(),
        );
        foreach ($aArray as $key => $value) {
            
            if (empty($value['value'])) {
                $aReturn['valid'] = false;
                $aReturn['message'] = "Veuillez remplir tous les champs";
                return $aReturn;
            }
            
            if ($value['name'] == "motDePasse") {
                $value['value'] = sha1($value['value']);
            }
            $aReturn['data'][$value['name']] = $value['value'];
        }
        
        if ($aReturn['valid']) {
            $aConnectUser = $ajax->post("connect", $aReturn['data']);
            
//            var_dump($aConnectUser);exit;
            if (!$aConnectUser->valid) {
                $aReturn['valid'] = $aConnectUser->valid;
                $aReturn['message'] = "Utilisateur ou mot de passe incorrect";
            } else {
                $aReturn['message'] = "Bien connecté";
                $this->populateWithApi($aConnectUser->data);
            }
        }
        
        return $aReturn;
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
            
            if ($indexKey == "motDePasse") {
                $value['value'] = sha1($value['value']);
            }
            
            if ($indexKey == "motDePasseConfirmation") {
                
                if ($aReturn['data']['motDePasse'] != sha1($value['value'])) {
                    $aReturn['valid'] = false;
                    $aReturn['message'] = "Les mots de passe ne correspondent pas";
                    return $aReturn;
                }
            } else {
                //pour eviter d'envoyer la confirmation de mot de passe au serveur
                $aReturn['data'][$indexKey] = $value['value'];
            }
            
        }
        return $aReturn;
    }
    
    public function populateWithApi($aArray) {
//        var_dump($aArray);exit;
        $this->id = $aArray->id;
        $this->administrateur = $aArray->administrateur;
        $this->motDePasse = $aArray->motDePasse;
        $this->pseudo = $aArray->pseudo;
        $this->email = $aArray->email;
    }
    
    
    
    function __destruct()
    {

    }
}
