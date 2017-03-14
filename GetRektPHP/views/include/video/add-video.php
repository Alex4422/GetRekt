<?php

?>
<div id="add-video" class="add-video">
    <h1>Ajouter une video</h1>

    <form method="POST" enctype="multipart/form-data" id="add-video-form">
        <div class="element-wrapper">
            <label for="videoTitle">Titre</label>
            <input type="text" name="titre" id="videoTitle"/>
        </div>
        <div class="element-wrapper">
            <label for="videoLink">Lien</label>
            <input type="text" name="lien" id="videoLink"/>
        </div>
        <div class="element-wrapper">
            <label for="videoDescription">Description</label>
            <textarea name="description" id="videoDescription"></textarea>
        </div>            
        <div class="element-wrapper">
            <label for="videoCategorie">Categorie</label>
            <select name="categorie" id="videoCategorie">
                <option value="0">Aucune</option>
                <?php 
                    foreach ($aDataList['categories'] as $key => $categorie) {
                        echo "<option value='".$categorie->id."'>".$categorie->nom."</option>";
                    }
                ?>
            </select>
        </div>
        <iframe id="downloader" src="<?php echo $globals['base_path'] ?>/views/include/video/file-upload.php?filename=<?php echo $_SESSION['video']['filename'] ?>" style="height: 200px; width: 100%"></iframe>
        <div class="element-wrapper">
            <button type="submit" name="submit" id="add-video-btn" class="get-rekt-btn">Ajouter</button>
        </div>
    </form>

</div>

