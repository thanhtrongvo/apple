<?php
include('../database/connection.php');
session_start();
ob_start();
    if(!isset($_SESSION)) session_start();
    
    // if(!isset($_SESSION['cart'])) {
    //     $_SESSION['cart'] = array([
    //         'id' => array(['id']),
    //     ]); 
    // }
    // Xử lý yêu cầu ajax và lưu sản phẩm vào session
    if(!isset($_SESSION['name'])) {
        echo "<script> alert('Please login to continue!') </script>";
        header('location:../index.php');
    }
    else {
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
    }

    //Xu li yeu cau xóa sp
    if (isset($_POST['remove_id'])) {
        $id = $_POST['remove_id'];
        removeFromCart($id);
    }
    
    if (isset($_GET['qty_minus'])){
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
    if (isset($_GET['qty_input'])){
        $id = $_GET['id'];
        $quantity = $_GET['qty_input'];
        if($quantity != 0){
            $mul = $quantity - $_SESSION['cart'][$id]['quantity'];
            $_SESSION['cart']['total'] += bcmul($_SESSION['cart'][$id]['price'],$mul);
            $_SESSION['cart'][$id]['quantity'] = $quantity;
        } else {
            removeFromCart($id);
        }
    }

    
    if(isset($_GET['order'])){
        $add = $_GET['addr'];
        $note = $_GET['note'];
        $usrid = $_SESSION['id'];
        $usrname = $_SESSION['name'];
        $phone = $_SESSION['phone'];
        $email = $_SESSION['email'];
        $total = $_SESSION['cart']['total'];
        $sql = "INSERT INTO orders (id, user_id, fullname, email, phone_number, address, note, order_date, status, total_money)
                VALUES (NULL, '$usrid', '$usrname', '$email', '$phone', '$add', '$note', now(), NULL, '$total');";
        if(mysqli_query($conn, $sql)){
            $result = mysqli_query($conn,"SELECT id FROM `orders` ORDER BY `id` DESC;");
            $rs = mysqli_fetch_array($result);
            $orderid = $rs[0];
            foreach ($_SESSION['cart'] as $key => $value) {
                //loai trừ trường hợp 0 và total
                if($key != 0 && $key != 'total'){
                    $price = $value['price'];
                    $num = $value['quantity'];
                    $total_money = bcmul($price,$num);
                    $sql = "INSERT INTO order_details (id, order_id, product_id, price, num, total_money) VALUES (NULL, '$orderid', '$key', '$price', '$num', '$total_money');";
                    mysqli_query($conn,$sql);
                }
            }
            destroyCart();
            header('location: https://localhost/apple/index.php');
        }
    }



    //Xu li yeu cau xoa gio hang
    function destroyCart(){
        unset($_SESSION['cart']);
    }
    //Xu li yeu cau xoa 1 sp
    function removeFromCart($id)  {
        unset($_SESSION['cart'][$id]);
    }
?>