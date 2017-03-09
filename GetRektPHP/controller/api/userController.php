<?php

use Model as Model;
use Lib as Lib;


$ajax = new Lib\Ajax("questions");
$ajax->get("1/");
var_dump($ajax);exit;

$user = new Model\User();
var_dump($user);
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
