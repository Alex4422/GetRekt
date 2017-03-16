<?php
session_start();
$aAllowedExtensions = array("mp4", "webm", "ogg");

//message qui sera affiché à l'user quand il va valider le formulaire
$sMessageResult = "Video : (" . implode(", ", $aAllowedExtensions) . ") max 100Mo";


if (!isset($_GET['filename']) && empty($_GET['filename'])) {
    echo "Une erreure est survenue";
    exit;
}

if (isset($_FILES["videoFile"]) && !empty($_FILES["videoFile"])) {
    $videoImage = $_FILES["videoFile"];
//    var_dump($videoImage);

    $path = $videoImage['name'];
    $extension = pathinfo($path, PATHINFO_EXTENSION);


    if ((($_FILES["videoFile"]["type"] == "video/mp4") ||
            ($_FILES["videoFile"]["type"] == "video/webm") ||
            ($_FILES["videoFile"]["type"] == "video/ogg")) &&
            in_array($extension, $aAllowedExtensions)) {
        $filename = $_GET['filename'] . "." . $extension;
        if ($videoImage['size'] <= 100000000) {
            if (move_uploaded_file($videoImage['tmp_name'], __DIR__ . "/../../../media/video/uploads/" . $filename)) {
                $sMessageResult = $videoImage['name'];
                $_SESSION['video']['videoName'] = $filename;
            } else {
                $sMessageResult = "Une erreur est survenue, veuillez réessayer";
            }
        } else {
            $sMessageResult = "Le fichier ne doit pas dépasser les 100Mo";
        }
    } else {
        $sMessageResult = "Veuillez uploader un fichier dans un des format suivants :" . implode(", ", $aAllowedExtensions);
    }

    if (isset($extension) && !empty($extension) && in_array($extension, $aAllowedExtensions)) {
        
    }
}
?>

<html>
    <head>
        <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/GetRektPHP/js/vendor/jquery/jquery-2.1.4.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/GetRektPHP/"; ?>css/loaders.min.css">
        <style> 
            form {
                margin: 0;
                text-align: center;
            }
            form input {
                width: 100%;
                height: 100%;
                opacity: 0;
                position: absolute;
                left: 0;
                top: 0;
                /*                cursor: pointer;
                                display: block;*/
            }
            .file-btn {
                width: 100%;
                max-width: 100px;
                position: relative;
                background: #00309f;
                color: white;
                position: relative;
                display: inline-block;
                text-align: center;
                padding: 5px;
            }
            .loader-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                background: rgba(0, 0, 0, 0.9);
                text-align: center;
                padding-top: 5px;
            }
            .loader-overlay .text {
                color: white;
            }
            .loader {
                display: inline-block;
                margin-left: 50px;
                vertical-align: middle;
            }
            
            .pacman>div:first-of-type, .pacman>div:nth-child(2) {
                width: 0;
                height: 0;
                border-right: 25px solid transparent;
                border-top: 25px solid #ffd900;
                border-left: 25px solid #ffd900;
                border-bottom: 25px solid #ffd900;
                border-radius: 25px;
                position: relative;
                left: -30px;
            }

            .pacman>div:nth-child(3), .pacman>div:nth-child(4), .pacman>div:nth-child(5), .pacman>div:nth-child(6) {
                background-color: #ffd900;
                border-radius: 100%;
                margin: 2px;
                width: 10px;
                height: 10px;
                position: absolute;
                top: 25px;
                left: 70px;
            }
        </style>
    </head>
    <body style="margin:0;" >
        <form name="pj" id="pj" enctype="multipart/form-data" method="post">
            <span class="file-txt">
                <?php echo $sMessageResult; ?>
            </span>
            <div class="file-btn">
                Parcourir
                <input type="file" name="videoFile" id="videoFile" placeholder="Charger mon ticket de caisse" />
            </div>
        </form>
        <div class="loader-overlay">    
            <div class="text">
                La vidéo est en train d'être chargée, veuillez patienter...
                <div class="loader"><div class="pacman"><div></div><div></div><div></div><div></div><div></div></div></div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#videoFile').off('change').on('change', function () {
            var form = document.forms['pj'];
            form.submit();
            $(".loader-overlay").show();
        });
    });
</script>

