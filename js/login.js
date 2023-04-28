function showModal(){
    var a = document.getElementById("modal");
    a.style.display = "block";
    a.style.transformOrigin = "top 70%";
    a.style.animation = "Grow ease-in .3s";
}
function exitModal(){
    var a = document.getElementById("modal");
    a.style.display = "none"
}
