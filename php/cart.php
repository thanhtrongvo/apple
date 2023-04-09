<?php 
    session_start();
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array(); //

        
    }
    function addToCart($item) {
        $_SESSION['cart'][] = $item ; 

    }
    function removeFromCart($item) {
        unset($_SESSION['cart'][$item]);
    }
    function displayCart() {
        foreach ($_SESSION['cart'] as $item ) {
            echo $item."<br> ";
        }
    }
    

?>