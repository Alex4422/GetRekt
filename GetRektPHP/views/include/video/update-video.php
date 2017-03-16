<div id="update-video" class="update-video content-container">
    <h1 class="block-title">Modifier une video</h1>

    <form method="POST" enctype="multipart/form-data" id="update-video-form">
        <div class="element-wrapper">
            <input type="hidden" name="id" id="videoId" value="<?php echo $video->getId(); ?>"/>
        </div>        
        <div class="element-wrapper">
            <input type="hidden" name="dateDeCreation" id="videoCreationDate" value="<?php echo $video->getDateDeCreation(); ?>"/>
        </div>
        <div class="element-wrapper">
            <label for="videoTitle">Titre</label>
            <input type="text" name="titre" id="videoTitle" value="<?php echo $video->getTitre(); ?>"/>
        </div>
        <div class="element-wrapper">
            <label for="videoDescription">Description</label>
            <textarea name="description" id="videoDescription"><?php echo $video->getDescription(); ?></textarea>
        </div>            
        <div class="element-wrapper">
            <label for="videoCategorie">Categorie</label>
            <select name="categorie" id="videoCategorie">
                <option value="0">Aucune</option>
                <?php 
                    foreach ($aDataList['categories'] as $key => $categorie) {
                        echo "<option value='".$categorie->getId()."'";
                        if ($video->getCategorie() == $categorie->getId()) { echo " selected='selected'"; }
                        echo ">".$categorie->getNom()."</option>";
                    }
                ?>
            </select>
        </div>
        <iframe id="downloader" src="<?php echo $globals['base_path'] ?>/views/include/video/video-upload.php?filename=<?php echo $_SESSION['video']['filename'] ?>" style="height: 60px; width: 100%"></iframe>
        <iframe id="downloader" src="<?php echo $globals['base_path'] ?>/views/include/video/file-upload.php?filename=<?php echo $_SESSION['video']['filename'] ?>" style="height: 60px; width: 100%"></iframe>
        <div class="element-wrapper">
            <button type="submit" name="submit" id="add-video-btn" class="get-rekt-btn">Ajouter</button>
        </div>
    </form>

</div>

