(function ($) {
    
//    console.log('user js');
    
    $("#add-user-form").submit(function(e) {
        e.preventDefault();
        var data = $(this).serializeArray();
        console.log(data);
        var options = {
            type:"user",
            request:"post",
            method:"post",
            params:{
                data:data
            },            
        };
        var oAjax = new AjaxRequest(options);
        oAjax.query();
    });

})(jQuery);
