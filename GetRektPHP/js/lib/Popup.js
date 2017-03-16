
function appendPopup(message) {
    var sElement = "<div id='get-rekt-popin'><div class='message'>"+message+"</div></div>";
    $("body").append(sElement);
}
function removePopup() {
    $("#get-rekt-popin").remove();
}
