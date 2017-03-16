<?php


use Model as Model;

$videoFolder = __DIR__."/../views/include/video/";

$aDataList = array();
$categorie = new \Model\Categorie();
$video =  new \Model\Video();

$aDataList['categorie']['list'] = $categorie->getAll();

$aDataList['video']['list'] = $video->getAll();


include_once __DIR__."/../views/include/accueil.php";

