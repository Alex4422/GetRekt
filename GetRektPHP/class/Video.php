<?php

namespace Model;
use Lib as Lib;

class Video {
    private $id;    
    private $titre;
    private $lien;
    private $image;
    private $dateDeCreation;
    private $description;
    private $user;
    private $categorie;
    private $ajax;

    function __construct()
    {
        $this->ajax = new Lib\Ajax("video");
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
    
    public function createVideo($aArray) {        
        return $this->ajax->post("", $aArray);
    }
    
    public function updateVideo($aArray) {        
        return $this->ajax->post($aArray['id']."/update_video", $aArray);
    }    
    
    public function deleteVideo($id) {
        return $this->ajax->delete($id . "/delete_video");
    }
    
    public function getVideoById($id) {        
        return $this->ajax->get($id);
    }
    
    public function getAll() { 
        $aApiVideos = $this->ajax->get("");
        $aVideos = array();
        foreach ($aApiVideos as $key => $video) {
            $currentVideo = new Video();
            $aVideos[] = $currentVideo->populateWithApi($video);
        }
        return $aVideos;
    }
    
    
    public function getAllVoteByVideo($vid) {    
//        var_dump($vid);exit;
        $aApiVotes = $this->ajax->post($vid."/getvotes", array("video" => $vid));
//        var_dump($aApiVotes);exit;
        $aVotes = array();
        foreach ($aApiVotes as $key => $vote) {
            $currentVote = new Vote();
//            var_dump($vote);exit;
            $aVotes[] = $currentVote->populateWithApi($vote);
        }
        return $aVotes;
    }
    
    
    public function getAllCommentairesByVideo($vid) {    
//        var_dump($vid);exit;
        $aApiVotes = $this->ajax->post($vid."/getcommentaires", array("video" => $vid));
//        var_dump($aApiVotes);exit;
        $aVotes = array();
        foreach ($aApiVotes as $key => $vote) {
            $currentVote = new Commentaire();
//            var_dump($vote);exit;
            $aVotes[] = $currentVote->populateWithApiArray($vote);
        }
        return $aVotes;
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
            
            if ($indexKey == "categorie" && $value['value'] == 0) {                
                $aReturn['valid'] = false;
                $aReturn['message'] = "Veuillez choisir une catégorie valide";
                return $aReturn; 
            }
            
            $aReturn['data'][$indexKey] = $value['value'];
            
        }
        return $aReturn;
    }
    
    
    public function populateWithApi($aArray) {
//        var_dump($aArray);exit;
        $this->id = $aArray->id;
        $this->description = $aArray->description;
        $this->titre = $aArray->titre;
        $this->lien = $aArray->lien;
        $this->image = $aArray->image;
        $this->dateDeCreation = $aArray->dateDeCreation;
        $this->user = $aArray->idUser;
        $this->categorie = $aArray->idCategorie;
        return $this;
    }
    
    
    public function populateWithApiArray($aArray) {
//        var_dump($aArray);exit;
        $this->id = $aArray->id;
        $this->description = $aArray->description;
        $this->titre = $aArray->titre;
        $this->lien = $aArray->lien;
        $this->image = $aArray->image;
        $this->dateDeCreation = $aArray->dateDeCreation;
        $this->user = $aArray->idUser;
        $this->categorie = $aArray->idCategorie;
        return $this;
    }


}
