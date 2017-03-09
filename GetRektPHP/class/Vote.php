<?php


class Vote {
    private $id;
    private $date;
    private $user;
    private $video;


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

    public function setName($value)
    {
        $this->name = $value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDate($value)
    {
        $this->date = $value;
    }

    public function getDate()
    {
        return $this->date;
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

    //retourne toutes les votes en base de données
    public function getAllVotes() {
        $listVotes = "all votes";

        return $listVotes;
    }

    public static function getVoteByUserAndVideo($uid, $vid) {
        $vote = "vote by user id and video id";

        return $vote;
    }

    //Rentrer une nouvelle vote.
    public function insertNewVote(){
      //curl request to insert new vote
    }


    public function deleteVoteById($vid) {
      //curl to delete vote
    }


}
