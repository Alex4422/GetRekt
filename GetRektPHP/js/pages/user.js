(function ($) {
    
//    console.log('user js');
    
    function inscriptionDone(data) {        
        appendPopup(data.message, data.valid);
    }
    
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
        var oAjax = new AjaxRequest(options, inscriptionDone);
        oAjax.query();
    });

})(jQuery);
