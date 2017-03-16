
function Loader(data) {
    
}

function appendLoader(sElement) {
    var sLoader = "<div class='loader-overlay'><div class='loader'><div class='pacman'><div></div><div></div><div></div><div></div><div></div></div></div></div>";
    $(sElement).append(sLoader);
}

function removeLoader() {
    $(".loader-overlay").remove();
}
