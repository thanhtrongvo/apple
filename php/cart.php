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
    
    if (isset($_GET['qty'])){
        $id = $_GET['quantity_minus'];
        if(--$_SESSION['cart'][$id]['quantity'] == 0)
            removeFromCart($id);
    }
    
    function removeFromCart($id)  {
        unset($_SESSION['cart'][$id]);
    }
    function destroyCart(){
        unset($_SESSION['cart']);
    }
    function displayCart() {
        if (!empty($_SESSION['cart'])) {
            //vòng for in danh sách giỏ hảng
            foreach ($_SESSION['cart'] as $key => $value) {
                //loai trừ trường hợp 0 và total
                if($key != 0 && $key != 'total'){
                $total = bcmul($value['price'],$value['quantity']);
                echo '<tr>
                    <td>
                        <div class="display-flex align-center">
                            <div class="img-product">
                                <img src="'.$value['image'].'" alt="" class="mCS_img_loaded">
                            </div>
                            <div class="name-product">'.$value['name'].
                            '</div>
                            <div class="price">$'.number_format($value['price'],0,',').
                            '</div>
                        </div>
                    </td>
                    <td class="product-count">
                        <form  class="count-inlineflex">
                            <button type="submit" class="qtyminus" name="qtyminus" onclick="minusQty(event)">-</button>
                            <input type="text" name="quantity" value="'.$value['quantity'].'" class="qty">
                            <input type="hidden" name="id" value="'.$key.'">
                            <button type="submit" class="qtyplus" name="qtyplus">+</button>
                        </form>
                    </td>
                    <td>
                        <div class="total">$'.number_format($total,0,',').
                    '</div>
                    </td>
                    <td>
                        <a href="#" title="">
                            <img src="images/icons/delete.png" alt="" class="mCS_img_loaded">
                        </a>
                    </td>
                </tr>';
                }
            }
        }
    }
    
?>