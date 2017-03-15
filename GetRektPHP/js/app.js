(function ($) {
    
//    console.log("app");
    
    $(".ajax-test").click(function() {
        var options = {
            type:"commentaire",
            request:"get",
            method:"get",
            params:{},            
        };
        var oAjax = new AjaxRequest(options);
        oAjax.query();
    });
    
    function connectSuccess(data) {
        console.log(data);
        if (data.valid) {
            location.reload();            
        }
    }
    
    
    $("#connect-user-form").submit(function(e) {
        e.preventDefault();
        var data = $(this).serializeArray();
        console.log(data);
        var options = {
            type:"user",
            request:"connect",
            method:"post",
            params:{
                data:data
            },            
        };
        var oAjax = new AjaxRequest(options, connectSuccess);
        oAjax.query();
    });
    
    if (typeof getRekt !== 'undefined') {
        appendVideos(getRekt.videoList);        
    }
    

})(jQuery);


    function videoDecorator(oVideo) {
        var sElement = "<div class='video-item'>";        
        
            sElement += "<div class='title-video'><a href='?page=video&action=show&id="+oVideo.id+"'>"+ oVideo.titre +"</a></div>";
            sElement += "<div class='infos-video'>";
                sElement += "<div class='image' style='background:url(\"/GetRektPHP/media/image/uploads/"+oVideo.image+"\")'></div>";
                sElement += "<divc class='description'>"+oVideo.description+"</div>";
            sElement += "</div>";
        
        sElement += "</div>";        
        
        return sElement;
    }
    
    function appendVideos(aListVideos) {
        var sHtml = "";
        for (var i = 0; i < aListVideos.length; i++) {     
            sHtml += videoDecorator(aListVideos[i]);
        }
        $("#videoList .video-container").text("");
        $("#videoList .video-container").append(sHtml);
    }
