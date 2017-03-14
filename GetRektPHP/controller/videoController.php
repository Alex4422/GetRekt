<?php

use Model as Model;

$videoFolder = __DIR__."/../views/include/video/";

$aDataList = array();
$categorie = new \Model\Categorie();

if (isset($_GET['action']) && !empty($_GET['action'])) {
    switch ($_GET['action']) {
        case "add":
            $_SESSION['video']['filename'] = date("YmdHis");
            $aDataList['categories'] = $categorie->getAllCategorie();
            include_once $videoFolder . "add-video.php";    
        break;
    
        case "show":
            include_once $videoFolder . "show-video.php";    
        break;
    
        case "filter":
            $includeFile = "list-video.php";
            if (isset($_GET['category']) && !empty($_GET['category'])) {
                $includeFile = "list-video-categorie.php";
            }
            include_once $videoFolder . $includeFile;
        break;
//        case "add":
//            include_once $videoFolder . "show-video.php";  
//        break;

        default:            
            include_once $videoFolder . "list-video.php";
        break;
    }
} else {    
    include_once $videoFolder . "list-video.php";
}


