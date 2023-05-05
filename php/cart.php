<?php 
    if(!isset($_SESSION)) session_start();
    
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array([
            'id' => array(['id']),
            'name' => array(['name']),
            'price' => array(['price']),
            'quantity' => array(['quantity']),
            'image' => array(['image']),
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

    if (isset($_POST['remove_id'])) {
        $id = $_POST['remove_id'];
        unset($_SESSION['cart'][$id]);
    }
    
    function removeFromCart($id)  {
        unset($_SESSION['cart'][$id]);
    }
    function destroyCart(){
        unset($_SESSION['cart']);
    }
    function displayCart() {
        // Hiển thị giỏ hàng từ session
        if (!empty($_SESSION['cart'])) {
            $total = 0;
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            foreach ($_SESSION['cart'] as $key => $value) {
            echo "<form class='cart_item' method='POST'>";
            echo $key;
            echo "<span>".$value['name']."</span>";
            echo "<span>".$value['price']."</span>";
            echo "<span>".$value['quantity']."</span>";
            echo "<input type='hidden' name='remove_id' value='".$key."'> </input>";
            echo "<button type='submit' value='removeFromCart'> Xóa sản phẩm </button>";
            echo "</form>";
            $total += bcmul($value['price'],$value['quantity']);
            }
            echo "<div class='cart-total'>";
            echo "<span>Total: ".$total."</span>";
            echo "</div>";
        }
        
    }
?>