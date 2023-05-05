function showModal(){
    var a = document.getElementById("modal");
    a.style.display = "block";
    a.style.transformOrigin = "top 70%";
    a.style.animation = "Grow ease-in .3s";
}
function exitModal(){
    var a = document.getElementById("modal");
    a.style.display = "none";
}
function validateSignUp(){
    var name = doccument.forms['fullname']['name'].value;
}
function exitModalInfo(){
    var a = document.getElementById("modal__in4");
    a.style.display = "none"
} 
function showInfo(){
    var a = document.getElementById("modal__in4");
    a.style.display = "block";
    a.style.transformOrigin = "top 70%";
    a.style.animation = "Grow ease-in .3s";
}function logout(){
    location.replace("admin/logout.php");
}
   

