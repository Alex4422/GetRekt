<?php

use Lib as Lib;
use Model as Model;

$ajax = new Lib\Ajax();
$security = new Lib\Security();
$vote = new \Model\Vote();

header('Content-Type: application/json');
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
        $aRequestData = array(
            "video" => $_POST['data']['video'],
            "user" => $sessionUser->getId(),
            "dateDeCreation" => date("Y-m-d H:i:s"),
        );
//        var_dump($aRequestData);exit;
        $aApi = $vote->voteForVideo($aRequestData);
        var_dump($aApi);exit;

        break;

    default:
        break;
}

// on retourne la reponse json
echo json_encode($data);
