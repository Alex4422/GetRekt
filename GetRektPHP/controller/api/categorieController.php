<?php

header('Content-Type: application/json');

use Lib as Lib;
use Model as Model;

$ajax = new Lib\Ajax();
$security = new Lib\Security();
$categorie = new \Model\Categorie();

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
        $aValidation = $categorie->validateFields($_POST['data']);
        if ($aValidation['valid']) {
            $aReturn = $categorie->createCategorie($aValidation['data']);
        }
        
        var_dump($aReturn);exit;

        break;

    default:
        break;
}

// on retourne la reponse json
echo json_encode($data);
