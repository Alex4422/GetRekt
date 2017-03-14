(function ($) {
    
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
    
    function submitSuccess(data) {
        console.log(data);
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
        var oAjax = new AjaxRequest(options, submitSuccess);
        oAjax.query();
    });

})(jQuery);
