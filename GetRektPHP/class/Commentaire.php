<?php

namespace Model;

use Lib as Lib;

class Commentaire {
    private $id;
    private $message;
    private $dateDeCreation;
    private $user;
    private $video;
    public $ajax;


    function __construct()
    {
        $this->ajax = new Lib\Ajax("commentaire");
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setMessage($value)
    {
        $this->message = $value;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setDateDeCreation($value)
    {
        $this->dateDeCreation = $value;
    }

    public function getDateDeCreation()
    {
        return $this->dateDeCreation;
    }

    public function setUser($value)
    {
        $this->user = $value;
    }

    public function getUser()
    {
        return $this->user;
    }
    
    public function setVideo($value)
    {
        $this->video = $value;
    }

    public function getVideo()
    {
        return $this->video;
    }
    
    public function deleteById() {
        
    }
    
    public function getAll() {
        $aApiCommentaires = $this->ajax->get("");
        $aCommentaires = array();
        foreach ($aApiCommentaires as $key => $commentaire) {
            $currentCommentaire = new Commentaire();
            $aCommentaires[] = $currentVideo->populateWithApi($commentaire);
        }
        return $aCommentaires;        
    }
    
    
    public function createCommentaire($aArray) {        
        return $this->ajax->post("", $aArray);
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
    
    
    public function populateWithApi($aArray) {
//        var_dump($aArray);exit;
        $this->id = $aArray->id;
        $this->message = $aArray->message;
        $this->video = $aArray->idVideo;
        $this->user = $aArray->idUser;
        $this->dateDeCreation = $aArray->dateDeCreation;
        return $this;
    }
    
    public function populateWithApiArray($aArray) {
//        var_dump($aArray);exit;
        $this->id = $aArray[0];
        $this->message = $aArray[1];
        $this->dateDeCreation = $aArray[2];
        $this->user = $aArray[3];
        $this->video = $aArray[4];
        return $this;
    }
    


}
