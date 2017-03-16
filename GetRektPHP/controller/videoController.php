<?php

use Model as Model;

$videoFolder = __DIR__."/../views/include/video/";

$aDataList = array();
$categorie = new \Model\Categorie();
$video =  new \Model\Video();
$vote = new \Model\Vote();


$aDataList['categories'] = $categorie->getAll();
//$aDataList['categories'] = json_decode(json_encode($categoriesList), True);

if (isset($_GET['action']) && !empty($_GET['action'])) {
    switch ($_GET['action']) {
        case "add":
            $_SESSION['video']['filename'] = date("YmdHis");
            include_once $videoFolder . "add-video.php";    
        break;
    
        case "update":
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $aApi = $video->getVideoById($_GET['id']);
                $video->populateWithApi($aApi);
//                var_dump($video);exit;
                $aImage = explode(".", $video->getImage(), 2);
                $_SESSION['video']['filename'] = $aImage[0];
                include_once $videoFolder . "update-video.php";    
            } else {
                include_once $videoFolder . "add-video.php";    
            }
        break;
    
        case "show":
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $aApi = $video->getVideoById($_GET['id']);
                $video->populateWithApi($aApi);
                
                $aVoteVideo = $video->getAllVoteByVideo($video->getId());
                $aDataList['votes']['total'] =count($aVoteVideo);
                
                $aCommentaireVideo = $video->getAllCommentairesByVideo($video->getId());
                $aDataList['commentaires']['list'] = $aCommentaireVideo;
//                var_dump($aDataList['commentaires']['list']);
                
                include_once $videoFolder . "show-video.php";
            } else {
                header("location:".$globals['base_path']."?page=404");
            }
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


