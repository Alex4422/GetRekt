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
        $this->ajax = new Lib\Ajax("user");
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
    
    
    function __destruct()
    {

    }
}
