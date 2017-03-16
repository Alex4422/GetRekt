<?php

$videoFolder = __DIR__."/../views/include/categorie/";

$aDataList = array();

if (isset($_GET['action']) && !empty($_GET['action'])) {
    switch ($_GET['action']) {
        case "add":
            include_once $videoFolder . "add-categorie.php";    
        break;
    
        case "show":
            include_once $videoFolder . "show-categorie.php";    
        break;
    
        case "edit":
            include_once $videoFolder . "edit-categorie.php";    
        break;
    
//        case "add":
//            include_once $videoFolder . "show-video.php";  
//        break;

        default:            
            include_once $videoFolder . "list-categorie.php";
        break;
    }
} else {    
    include_once $videoFolder . "list-categorie.php";
}


