<?php
    if(!isset($_SESSION)) session_start();
    
    // if(!isset($_SESSION['cart'])) {
    //     $_SESSION['cart'] = array([
    //         'id' => array(['id']),
    //     ]); 
    // }
    // Xử lý yêu cầu ajax và lưu sản phẩm vào session
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['image'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        if(isset($_SESSION['cart']['total'])){
            $_SESSION['cart']['total'] += $price;
        } else{
            $_SESSION['cart']['total'] = $price;
        }
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $_SESSION['cart'][$id] = array('name' => $name, 'price' => $price, 'image' => $image, 'quantity' => 1);
        }
    }

    //Xu li yeu cau xóa sp
    if (isset($_POST['remove_id'])) {
        $id = $_POST['remove_id'];
        removeFromCart($id);
    }
    
    if (isset($_GET['pty_minus'])){
        $id = $_GET['id'];
        $_SESSION['cart']['total'] -= $_SESSION['cart'][$id]['price'];
        if(--$_SESSION['cart'][$id]['quantity'] == 0)
            removeFromCart($id);
    }
    if (isset($_GET['qty_plus'])){
        $id = $_GET['id'];
        $_SESSION['cart'][$id]['quantity']++;
        $_SESSION['cart']['total'] += $_SESSION['cart'][$id]['price'];
        
    }

    function removeFromCart($id)  {
        unset($_SESSION['cart'][$id]);
    }
    function destroyCart(){
        unset($_SESSION['cart']);
    }
?>