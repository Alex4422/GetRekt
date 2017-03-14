<?php

header('Content-Type: application/json');

use Model as Model;
use Lib as Lib;


$security = new Lib\Security();
$user = new Model\User();
$ajax = new \Lib\Ajax("user");


$data = [
    "valid" => false,
    "message" => "Une erreur s'est produite"
];

switch ($_GET['request']) {
    case "delete":
        if ($security->isAdmin()) {
            $data['valid'] = true;
        } else {
            $data['message'] = "Vous n'etes pas autorisé à effectuer cette action";
        }


    break;
    
    case "get":


    break;

    case "post":
        $aValidation = $user->validateFields($_POST['data']);
        if ($aValidation['valid']) {
            
            $aValidation['data']['administrateur'] = 0;
            $aValidation['data']['dateDeCreation'] = date("Y-m-d H:i:s");
            
            $bUserExist = json_decode($user->existUser($ajax, $aValidation['data']))->valid;
//            var_dump($bUserExist);exit;
            
            if (!$bUserExist) {
                $result = $user->createUser($aValidation['data']);
                
                if (strpos($result, "required") === false) {
                    $data['valid'] = true;
                    $data['message'] = "Vous êtes bien inscrit !";
                }
            } else {                
                $data['valid'] = false;
                $data['message'] = "L'utilisateur est déjà inscrit !";
            }
            
        }

    break;
    
    
    case "connect":
        $aConnect = $user->connect($ajax, $_POST['data']);        
        $data['valid'] = $aConnect['valid'];
        $data['message'] = $aConnect['message'];
        
        if ($aConnect['valid']) {
            $_SESSION['user'] = serialize($user);
        }
//        var_dump($aConnect);exit;

    break;

    default:
        break;
}

// on retourne la reponse json
echo json_encode($data);
