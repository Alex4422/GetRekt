(function ($) {
    
    console.log('video js');
    
    $("#add-video-form").submit(function(e) {
        e.preventDefault();
        var data = $(this).serializeArray();
        console.log(data);
        var options = {
            type:"video",
            request:"post",
            method:"post",
            params:{
                data:data
            },            
        };
        var oAjax = new AjaxRequest(options);
        console.log("click ajax", oAjax);
        oAjax.query();
    });

})(jQuery);
