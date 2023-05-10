<?php 
    
    
    
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
                        <form  class="count-inlineflex" method="post">
                            <button type="submit" class="qtyminus" name="qtynimus">-</button>
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