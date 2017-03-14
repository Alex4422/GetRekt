(function ($) {
    
    console.log('categorie js');
    
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

})(jQuery);
