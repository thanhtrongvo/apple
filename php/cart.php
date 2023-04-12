<?php 
    session_start();
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array([
            'id' => $_SESSION['id'],
            'name' => $_SESSION['name'],
            'price' => $_SESSION['price'],
            'quantity' => $_SESSION['quantity'],
            'image' => $_SESSION['image'],
        ]); //

        
    }
    function addToCart($item) {
        $_SESSION['cart'][] = $item ; 

    }
    function removeFromCart($item)  {
        unset($_SESSION['cart'][$item]);
    }
    function displayCart() {
        foreach ($_SESSION['cart'] as $item ) {
            echo $item."<br> ";
        }
    }
    

?>