(function ($) {
    
//    console.log('categorie js');
    
    $("#add-category-form").submit(function(e) {
        e.preventDefault();
        var data = $(this).serializeArray();
//        console.log(data);
        var options = {
            type:"categorie",
            request:"post",
            method:"post",
            params:{
                data:data
            },            
        };
        var oAjax = new AjaxRequest(options);
        oAjax.query();
    });
    
    
    $(".list-categorie .categorie-selector").click(function(e) {
        $(".list-categorie .categorie-selector").removeClass('active');        
        $(this).addClass('active');
        var categorieId = $(this).data("categorie-id");
        var filteredVideoList = [];
        if (categorieId == 0) {
            appendVideos(getRekt.videoList);
            return;
        }
        
        for (var i = 0; i < getRekt.videoList.length; i++) {
            var video = getRekt.videoList[i];
            if (video.categorie == categorieId) {
                filteredVideoList.push(video);
            }
        }
//        console.log(filteredVideoList);
        appendVideos(filteredVideoList);
    });

})(jQuery);
