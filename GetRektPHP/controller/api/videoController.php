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
//        var_dump($_POST);exit;
        if ($security->isAdmin()) {

            if (isset($_POST['id']) && !empty($_POST['id'])) {
                $aApi = $video->deleteVideo($_POST['id']);

                $data['valid'] = true;
                $data['message'] = "La vidéo à bien été supprimée";
//                var_dump($aApi);exit;
            }
        } else {
            $data['valid'] = false;
            $data['message'] = "Vous n'etes pas autorisé à effectuer cette action";
        }


        break;
    case "get":

        break;

    case "post":
        if ($security->logged()) {
            $_POST['data'][] = array(
                "name" => "image",
                "value" => $_SESSION['video']['imageName'],
            );
            $_POST['data'][] = array(
                "name" => "lien",
                "value" => $_SESSION['video']['videoName'],
            );
            $aValidation = $video->validateFields($_POST['data']);

            if ($aValidation['valid']) {
                $aValidation['data']['dateDeCreation'] = date("Y-m-d H:i:s");
                $aValidation['data']['user'] = $sessionUser->getId();
                $aApi = $video->createVideo($aValidation['data']);
                $data['valid'] = true;
                $data['message'] = "La vidéo à bien été ajoutée";
            } else {
                $data['valid'] = false;
                $data['message'] = $aValidation['message'];
            }
        } else {
            $data['valid'] = false;
            $data['message'] = "veuillez vous connecter";
        }
        
//        exit;

        break;

    case "update":
        if ($security->isAdmin()) {
            $_POST['data'][] = array(
                "name" => "image",
                "value" => $_SESSION['video']['imageName'],
            );
            $_POST['data'][] = array(
                "name" => "lien",
                "value" => $_SESSION['video']['videoName'],
            );
            $aValidation = $video->validateFields($_POST['data']);

            if ($aValidation['valid']) {
                $aApi = $video->updateVideo($aValidation['data']);
                $data['valid'] = true;
                $data['message'] = "La vidéo à bien été modifiée";
            } else {
                $data['valid'] = false;
                $data['message'] = $aValidation['message'];
            }
        } else {
            $data['valid'] = false;
            $data['message'] = "Vous n'êtes pas autorisé a effectuer cette action";
        }

        break;


    default:
        break;
}

// on retourne la reponse json
echo json_encode($data);
