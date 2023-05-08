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
        echo '<div class="col-lg-8">
        <div class="main-heading">Shopping Cart</div>
        <div class="table-cart">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>';
        if (!empty($_SESSION['cart'])) {
            $cartTotal = 0;
            //vòng for in danh sách giỏ hảng
            foreach ($_SESSION['cart'] as $key => $value) {
                if($key != 0){
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
                        <form action="#" class="count-inlineflex">
                            <div class="qtyminus">-</div>
                            <input type="text" name="quantity" value="'.$value['quantity'].'" class="qty">
                            <div class="qtyplus">+</div>
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
                $cartTotal += $total;
                }
            }
        }
                echo '</tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="cart-totals">
                <h3>Cart Totals</h3>
                <form action="#" method="get" accept-charset="utf-8">
                    <table>
                        <tbody>
                            <tr>
                                <td>Subtotal</td>
                                <td class="subtotal">$2,589.00</td>
                            </tr>
                            <tr>
                                <td>Shipping</td>
                                <td class="free-shipping">Free Shipping</td>
                            </tr>
                            <tr class="total-row">
                                <td>Total</td>
                                <td class="price-total">';
                                if(empty($_SESSION['cart']))
                                    echo '$0.00';
                                else
                                    echo '$'.number_format($cartTotal,2,'.',',');
                                
                                echo '</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="btn-cart-totals">
                        <a href="#" class="update round-black-btn" title="">Update Cart</a>
                        <a href="#" class="checkout round-black-btn" title="">Proceed to Checkout</a>
                    </div>
                </form>
            </div>
        </div>';
    }
?>