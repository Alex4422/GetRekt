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
        $this->ajax = new Lib\Ajax("choices");
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
    
    public function getByUserIdAndVideoId() {
        
        return $this->ajax->get(1);
    }
    
    public function postCommentaire() {
        
//        $sParams = $this->ajax->arrayToQueryString();
        
        return $this->ajax->post("14/update_choice", array(
            "question" => 3,
            "choice_text" => "kikoo",
            "votes" => 35,
        ));
    }


}
