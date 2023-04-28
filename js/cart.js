function addCart(id) {    
    $.post ('shoppingCart.php',function(data){
        $('#cart').html(data);
        $('#cart').show();
        $('#cart').animate({
            
        })
    })
}