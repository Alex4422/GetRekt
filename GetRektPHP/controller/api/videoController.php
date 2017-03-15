<?php

use Lib as Lib;
use Model as Model;

$ajax = new Lib\Ajax();
$security = new Lib\Security();
$video = new \Model\Video();

header('Content-Type: application/json');
$data = [
    "valid" => false,
    "message" => "Une erreur s'est produite"
];

switch ($_GET['request']) {
    case "delete":        
        if ($security->isAdmin()) {
             
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $aApi = $video->deleteVideo($_GET['id']);
                
                $data['valid'] = true;
                var_dump($aApi);exit;            
            }
            
        } else {
            $data['message'] = "Vous n'etes pas autorisé à effectuer cette action";
        }


        break;
    case "get":

    break;

    case "post":
        $_POST['data'][] = array(
            "name" => "image",
            "value" =>  $_SESSION['video']['imageName'],
        );
        $aValidation = $video->validateFields($_POST['data']);
        
        if ($aValidation['valid']) {
            $aValidation['data']['dateDeCreation'] = date("Y-m-d H:i:s");
            $aValidation['data']['user'] = $sessionUser->getId();
            $aApi = $video->createVideo($aValidation['data']);
            var_dump($aApi);exit;
        }
        var_dump($aValidation);exit;
        
    break;
    
    case "update":
        $_POST['data'][] = array(
            "name" => "image",
            "value" =>  $_SESSION['video']['imageName'],
        );
        $aValidation = $video->validateFields($_POST['data']);
        
        if ($aValidation['valid']) {
            $aApi = $video->updateVideo($aValidation['data']);
            var_dump($aApi);exit;
        }
        var_dump($aValidation);exit;
        
    break;
    

    default:
        break;
}

// on retourne la reponse json
echo json_encode($data);
