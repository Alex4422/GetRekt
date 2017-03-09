<?php

use Lib as Lib;
use Model as Model;

$ajax = new Lib\Ajax();
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
