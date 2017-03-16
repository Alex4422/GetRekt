
function appendPopup(message, bRedirectToHome) {
    var sElement = "<div id='get-rekt-popin'><div class='message'><div class='close-btn'>X</div><div class='text'>"+message+"</div></div></div>";
    $("body").append(sElement);
       
    $("#get-rekt-popin").fadeIn();
   
    $("#get-rekt-popin .close-btn").click(function() {   
        
        $("#get-rekt-popin").fadeOut(500, function() {      
            if (bRedirectToHome) {
                window.location.replace("http://getrekt.dev/GetRektPHP/");
            }      
            $("#get-rekt-popin").remove();
        });
    });
}
function removePopup() {
}
