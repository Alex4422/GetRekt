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

<div id="accueil" class="list-all-note">

    <div id="videoList" class="list-videos">
        <h1>Liste des videos</h1>
        <div class="video-container"></div>

    </div>

    <div class="list-categorie">
        <div class="block-title">Categories</div>
        
        <div class="categorie-item">
            <div class="categorie-selector" data-categorie-id="0">
                <div class="check-arrow"></div>
            </div>
            <div class="categorie-label">Tous</div>
        </div>
        <?php
        foreach ($aDataList['categorie']['list'] as $key => $categorie) {
            ?>
        <div class="categorie-item">
            <div class="categorie-selector" data-categorie-id="<?php echo $categorie->getId(); ?>">
                <div class="check-arrow"></div>
            </div>
            <div class="categorie-label"><?php echo $categorie->getNom(); ?></div>
        </div>
               

            <?php
        }
        ?>

    </div>


</div>

