<?php 
    if(!isset($_SESSION)) session_start();
    
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array([
            'id' => $_SESSION['id'],
            'name' => $_SESSION['name'],
            'price' => $_SESSION['price'],
            'quantity' => $_SESSION['quantity'],
            'image' => $_SESSION['image'],
        ]); 
    }

    // Xử lý yêu cầu ajax và lưu sản phẩm vào session
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['image'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $_SESSION['cart'][$id] = array('name' => $name, 'price' => $price, 'image' => $image, 'quantity' => 1);
    }

    }
    
    function removeFromCart($item)  {
        unset($_SESSION['cart'][$item]);
    }
    function destroyCart(){
        unset($_SESSION['cart']);
    }
    function displayCart() {
        // Hiển thị giỏ hàng từ session
        if (!empty($_SESSION['cart'])) {
            $total = 0;
            foreach ($_SESSION['cart'] as $key => $value) {
            echo "<div class='cart-item'>";
            echo "<span>".$value['name']."</span>";
            echo "<span>".$value['price']."</span>";
            echo "<span>".$value['quantity']."</span>";
            echo "</div>";
            $total += bcmul($value['price'],$value['quantity']);
            }
            echo "<div class='cart-total'>";
            echo "<span>Total: ".$total."</span>";
            echo "</div>";
        }
        
    }
?>