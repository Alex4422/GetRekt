<?php

//echo "commentaire";exit;

use Model as Model;
use Lib as Lib;

$commentaire = new Model\Commentaire();

$result = $commentaire->getByUserIdAndVideoId();
//var_dump($result);
echo $result;exit;





$security = new Lib\Security();

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


        break;

    default:
        break;
}

// on retourne la reponse json
echo json_encode($data);
