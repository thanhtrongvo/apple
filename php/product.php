<?php 
function product_home($id){
    include('database/connection.php');
    $syn = "SELECT * FROM `product` WHERE category_id = '$id'";
    $result = mysqli_query($conn,$syn);
        for($i=0; $i < 5; $i++ ){
            $row = mysqli_fetch_array($result);
            
            echo
            '<li class="home__product--info">
            <a href="">
                <img src="'.$row[4].'" />
                <h3>'.$row[2].'</h3>
                <span class="price">'.number_format("$row[3]",0,".",".").'<u>đ</u></span>
            </a>
            <form class="form_item" method="post">
                <input type="hidden" name="name" value="'.$row["title"].'">
                <input type="hidden" name="id" value="'.$row["id"].'">
                <input type="hidden" name="price" value="'.$row["price"].'">
                <input type="hidden" name="image" value="'.$row["thumbnail"].'">
                <div class="tooltip">
                    <button class="themvaogio" type="submit" name="add_to_cart" value="addToCart">
                        <span class="tooltiptext" style="font-size: 15px;">Thêm vào giỏ</span>
                        +
                    </button>
                </div>
            </form>
            </li>';
        }
}
?>
