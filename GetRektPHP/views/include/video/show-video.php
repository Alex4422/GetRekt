<div id="show-video" class="show-video content-container">
    <h1 class="block-title"><?php echo $video->getTitre(); ?></h1>
    
    <div class="video-container">
        <div class="iframe-container">
            <video width="320" height="350" controls>
                <source src="<?php echo $globals['base_path']."media/video/uploads/".$video->getLien(); ?>" type="video/mp4">
                <source src="<?php echo $globals['base_path']."media/video/uploads/".$video->getLien(); ?>" type="video/ogg">
                <source src="<?php echo $globals['base_path']."media/video/uploads/".$video->getLien(); ?>" type="video/webm">
              Your browser does not support the video tag.
              </video>
        </div>
        <div class="infos-container">
            <div class="title-video">Infos</div>
            <div class="description"><?php echo $video->getDescription(); ?></div>
            <div class="other-infos">
                <div class="total-votes"><?php echo $aDataList['votes']['total']; ?></div>
                <button class="get-rekt-btn" data-vote data-type="vote" data-video-id="<?php echo $video->getId(); ?>">Vote</button>                
            </div>
            
        </div>
    
    </div>
    
    
    <div class="commentaires-container">
        <div class="title-video">Commentaires</div>
        <div class="commentaire-form">
            <form id="add-commentaire-form" class="add-commentaire-form">
                <textarea name="message"></textarea>
                <input type="hidden" name="video" value="<?php echo $video->getId(); ?>" />
                <button type="submit" class="get-rekt-btn">Poster</button>
            </form>
        </div>
        <div class="list-commentaires">
            
            <?php 
                foreach ($aDataList['commentaires']['list'] as $key => $commentaire) {
                    
            ?>
            <div class="com-contain">
                <div class="pseudo"><?php echo $commentaire->getOuser()->getPseudo(); ?> :</div>
                <div class="message"><?php echo $commentaire->getMessage(); ?></div>
            </div>
                
            <?php
                }
            
            ?>
            
        </div>
    </div>
    
</div>

