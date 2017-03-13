<?php

header('Content-Type: application/json');

//echo "commentaire";exit;

use Model as Model;
use Lib as Lib;

$commentaire = new Model\Commentaire();

//$result = $commentaire->getByUserIdAndVideoId();
$result = $commentaire->postCommentaire();
//var_dump($result);
echo json_encode($result);exit;





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


        break;

    default:
        break;
}

// on retourne la reponse json
echo json_encode($data);
