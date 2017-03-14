<?php

$videoFolder = __DIR__."/../views/include/user/";

$aDataList = array();

if (isset($_GET['action']) && !empty($_GET['action'])) {
    switch ($_GET['action']) {
        case "add":
            include_once $videoFolder . "add-user.php";    
        break;
    
        case "show":
            include_once $videoFolder . "show-user.php";    
        break;
    
        case "filter":
            
        break;
//        case "add":
//            include_once $videoFolder . "show-video.php";  
//        break;

        default:            
            include_once $videoFolder . "list-user.php";
        break;
    }
} else {    
    include_once $videoFolder . "list-user.php";
}


