function showModal(){
    var a = document.getElementById("modal");
    a.style.display = "block";
    a.style.webkitTransform = "70% top";
    a.style.animation = "Grow ease-in .3s";
}
function exitModal(){
    var a = document.getElementById("modal");
    a.style.display = "none"
}
