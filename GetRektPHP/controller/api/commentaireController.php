<?php

header('Content-Type: application/json');

use Model as Model;
use Lib as Lib;

$commentaire = new Model\Commentaire();
$user = new Model\User();


$security = new Lib\Security();

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
        $aValidation = $commentaire->validateFields($_POST['data']);
//        $aValidation['data']['message'] = nl2br($aValidation['data']['message']);
//        var_dump($aValidation['data']['message']);exit;
        if ($aValidation['valid']) {            
            $aValidation['data']['dateDeCreation'] = date("Y-m-d H:i:s");
            $aValidation['data']['user'] = $sessionUser->getId();
//        var_dump($aValidation['data']);exit;
            $aApi = $commentaire->createCommentaire($aValidation['data']);
//            var_dump($aApi);
            if ($aApi->id) {
                $data['valid'] = true;
                $data['message'] = "Le commentaire à bien été posté";
                $user->getById($aApi->idUser);
//                var_dump($user);exit;
                $data['data'] = array(
                    "message" => $aApi->message,
                    "user" => $user->getPseudo()
                );
            }
        }
        
        var_dump($aApi);exit;


        break;

    default:
        break;
}

// on retourne la reponse json
echo json_encode($data);
