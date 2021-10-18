function openNav() {
    document.getElementById("menu").style.width = "280px";
}

function closeNav() {
    document.getElementById("menu").style.width = "0";
}

function shadeIn(element) {
    var opacity = 0.1;
    if (opacity >= 1)
        return;
    var timer = setInterval(function () {
        if (opacity >= 1) {
            clearInterval(timer);
            opacity = 1;
        }
        element.style.opacity = opacity;
        opacity += opacity * 1.0;
    }, 60);
}
