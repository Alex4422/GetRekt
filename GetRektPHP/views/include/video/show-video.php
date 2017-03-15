<div id="add-video" class="add-video">
    <h1 class="title"><?php echo $video->getTitre(); ?></h1>
    
    <div class="video-container">
        <div class="iframe-container">
            <iframe id="downloader" src="<?php echo $video->getLien(); ?>" style="height: 250px; width: 100%; max-width: 300px;"></iframe>
        </div>
        <div class="infos-container">
            
        </div>
    </div>
    
    <button data-vote data-type="vote" data-video-id="<?php echo $video->getId(); ?>">Vote</button>
    
    
    <div class="commentaires-container">
        <div class="commentaire-form">
            <form id="add-commentaire-form" class="add-commentaire-form">
                <textarea name="message"></textarea>
                <input type="hidden" name="video" value="<?php echo $video->getId(); ?>" />
                <button type="submit">Poster</button>
            </form>
        </div>
    </div>
    
</div>

