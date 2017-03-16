<?php
session_start();
$aAllowedExtensions = array("jpeg", "jpg", "png");

//message qui sera affiché à l'user quand il va valider le formulaire
$sMessageResult = "Image : (" . implode(", ", $aAllowedExtensions) . ") max 250Ko";

if (!isset($_GET['filename']) && empty($_GET['filename'])) {
    echo "Une erreure est survenue";
    exit;
}

if (isset($_FILES["videoFile"]) && !empty($_FILES["videoFile"])) {
    $videoImage = $_FILES["videoFile"];
//    var_dump($videoImage);

    $path = $videoImage['name'];
    $extension = pathinfo($path, PATHINFO_EXTENSION);

    if (isset($extension) && !empty($extension) && in_array($extension, $aAllowedExtensions)) {
        $filename = $_GET['filename'] ."." . $extension;
        if ($videoImage['size'] <= 450000) {
            if (move_uploaded_file($videoImage['tmp_name'], __DIR__."/../../../media/image/uploads/".$filename)) {                
                $sMessageResult = $videoImage['name'];
                $_SESSION['video']['imageName'] = $filename;
            } else {
                $sMessageResult = "Une erreur est survenue, veuillez réessayer";
            }
            
        } else {
            $sMessageResult = "Le fichier ne doit pas dépasser les 250Ko";
        }
    } else {
        $sMessageResult = "Veuillez uploader un fichier dans un des format suivants :" . implode(", ", $aAllowedExtensions);
    }
}
?>

<html>
    <head>
        <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/GetRektPHP/js/vendor/jquery/jquery-2.1.4.min.js"></script>
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
        </style>
    </head>
    <body style="margin:0;" >
        <form name="pj" id="pj" enctype="multipart/form-data" method="post">
            <span class="file-txt">
                <?php echo $sMessageResult; ?>
            </span>
            <div class="file-btn">
                Parcourir
                <input type="file" name="videoFile" id="videoFile" placeholder="Mon image" />
            </div>
        </form>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#videoFile').off('change').on('change', function () {
            var form = document.forms['pj'];
            form.submit();
        });
    });
</script>

