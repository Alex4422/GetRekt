<script type="text/javascript">
    var getRekt = {
        videoList: [            
            <?php 
                foreach ($aDataList['video']['list'] as $key => $video) {
                    echo "{";
                    echo "id:".$video->getId().",";
                    echo "titre:'". addslashes($video->getTitre())."',";
                    echo "categorie:".$video->getCategorie().",";
                    echo "image:'".$video->getImage()."',";
                    echo "date:'".$video->getDateDeCreation()."',";
                    echo "description:'". addslashes($video->getDescription())."',";
                    echo "},";
                }
            ?>
        ]        
    };
//    console.log("getRekt",getRekt);
</script>

<aside class="categories-container">
    <div class="list-categorie">
        <div class="block-title">Categories</div>
        
        <div class="categorie-item">
            <div class="categorie-selector active" data-categorie-id="0">
                <img class="check-arrow" src="<?php echo $globals['base_path']; ?>media/image/common/check-arrow.png"/>
            </div>
            <div class="categorie-label">Tous</div>
        </div>
        <?php
        foreach ($aDataList['categorie']['list'] as $key => $categorie) {
            ?>
        <div class="categorie-item">
            <div class="categorie-selector" data-categorie-id="<?php echo $categorie->getId(); ?>">
                <img class="check-arrow" src="<?php echo $globals['base_path']; ?>media/image/common/check-arrow.png"/>
            </div>
            <div class="categorie-label"><?php echo $categorie->getNom(); ?></div>
        </div>
               

            <?php
        }
        ?>
    </div>
</aside>

<div id="accueil" class="list-all-video content-container">

    <div id="videoList" class="list-videos left-container">
        <h1 class="block-title">Dernières vidéos</h1>
        <div class="video-container">
            <div class='loader-overlay'><div class='loader'><div class='pacman'><div></div><div></div><div></div><div></div><div></div></div></div></div>
        </div>

    </div>
</div>

