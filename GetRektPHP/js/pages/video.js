(function ($) {
    
//    console.log('video js');
    
    $("#add-video-form").submit(function(e) {
        e.preventDefault();
        var data = $(this).serializeArray();
//        console.log(data);
        var options = {
            type:"video",
            request:"post",
            method:"post",
            params:{
                data:data
            },            
        };
        var oAjax = new AjaxRequest(options);
//        console.log("click ajax", oAjax);
        oAjax.query();
    });
    
    
    $("#update-video-form").submit(function(e) {
        e.preventDefault();
        var data = $(this).serializeArray();
//        console.log(data);
        var options = {
            type:"video",
            request:"update",
            method:"post",
            params:{
                data:data
            },            
        };
        var oAjax = new AjaxRequest(options);
//        console.log("click ajax", oAjax);
        oAjax.query();
    });
    
    $("#add-commentaire-form").submit(function(e) {
        e.preventDefault();
        var data = $(this).serializeArray();
//        console.log(data);
        var options = {
            type:"commentaire",
            request:"post",
            method:"post",
            params:{
                data:data
            },            
        };
        var oAjax = new AjaxRequest(options);
//        console.log("click ajax", oAjax);
        oAjax.query();
    });
    
    
    $("[data-delete]").click(function(e) {
        e.preventDefault();
        var type = $(this).data("type");
        var data = $(this).data("video-id");
        console.log(data);
        var options = {
            type:type,
            request:"delete",
            method:"post",
            params:{
                data:data
            },            
        };
        var oAjax = new AjaxRequest(options);
//        console.log("click ajax", oAjax);
        oAjax.query();
    });
    
    $("[data-vote]").click(function(e) {
        e.preventDefault();
        var type = $(this).data("type");
        var videoId = $(this).data("video-id");
        console.log("videoId", videoId);
        var options = {
            type:type,
            request:"post",
            method:"post",
            params:{
                data:{
                    video: videoId
                }
            },            
        };
        var oAjax = new AjaxRequest(options);
//        console.log("click ajax", oAjax);
        oAjax.query();
    });

})(jQuery);
