(function ($) {
    
    $(".ajax-test").click(function() {
        var options = {
            type:"commentaire",
            request:"get",
            method:"get",
            params:{},            
        };
        var oAjax = new AjaxRequest(options);
        console.log("click ajax", oAjax);
        oAjax.query();
    });

})(jQuery);
