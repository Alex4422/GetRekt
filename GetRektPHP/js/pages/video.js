(function ($) {
    
//    console.log('video js');
    function submitVideoDone(data) {
        appendPopup(data.message, true);
    }
    
    $("#add-video-form").submit(function(e) {
        e.preventDefault();
        var data = $(this).serializeArray();
        data[1].value = data[1].value.replace(/\r?\n/g, '<br />');
//        console.log(data);
        var options = {
            type:"video",
            request:"post",
            method:"post",
            params:{
                data:data
            },            
        };
        var oAjax = new AjaxRequest(options, submitVideoDone);
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
    
    function commentaireDone(data) {
        if (data.valid) {
            var sElement = '<div class="com-contain"><div class="pseudo">'+data.data.user+' :</div><div class="message">'+data.data.message+'</div></div>';
            
            $(".list-commentaires").prepend(sElement);
                
                
            
        }
    }
    $("#add-commentaire-form").submit(function(e) {
        e.preventDefault();
        var data = $(this).serializeArray();
        data[0].value = data[0].value.replace(/\r?\n/g, '<br />');
//        console.log(data);
        var options = {
            type:"commentaire",
            request:"post",
            method:"post",
            params:{
                data:data
            },            
        };
        var oAjax = new AjaxRequest(options,commentaireDone, ".commentaire-form");
//        console.log("click ajax", oAjax);
        oAjax.query();
    });
    
    
    function deleteDone(data) {
        console.log(data);
        if (data.valid) {            
                window.location.replace(rekt_base_path);
        }
    }
    
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
                id:data
            },            
        };
        var oAjax = new AjaxRequest(options, deleteDone);
//        console.log("click ajax", oAjax);
        oAjax.query();
    });
    
    
    function voteDone(data) {           
        var txt = parseInt($(".total-votes").text());
        txt = data.valid ? txt + 1 : txt -1;        
        $(".total-votes").text("");
        $(".total-votes").text(txt);
    }
    
    $("[data-vote]").click(function(e) {
        e.preventDefault();
        var type = $(this).data("type");
        var videoId = $(this).data("video-id");
//        console.log("videoId", videoId);
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
        var oAjax = new AjaxRequest(options, voteDone, ".other-infos");
//        console.log("click ajax", oAjax);
        oAjax.query();
    });

})(jQuery);
