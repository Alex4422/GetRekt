
function AjaxRequest(options) {
    console.log("ajaxREquest");
    var _this = this;
    this.type = options.type;
    this.request = options.request;
    this.method = options.method;
    this.params = options.params;
    this.sUrl = "?request="+this.request+"&type="+this.type;

    this.query = function() {   
        jQuery.ajax({
            url: _this.sUrl,
            method: _this.method,
            data: _this.params,
            dataType: "json",
        }).done(function () {
            $(this).addClass("done");
        });
    }
}
