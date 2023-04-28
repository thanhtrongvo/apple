<?php 
function product_home($id){
    include('database/connection.php');
    $syn = "SELECT * FROM `product` WHERE category_id = '$id'";
    $result = mysqli_query($conn,$syn);
        for($i=0; $i < 5; $i++ ){
            $row = mysqli_fetch_row($result);
            echo 
            '<li class="home__product--info">
            <a href="">
                <img src="'.$row[4].'" />
                <h3>'.$row[2].'</h3>
                <span class="price">'.number_format("$row[3]",0,".",".").'<u>đ</u></span>
                <div class="tooltip">
                    <button class="themvaogio">
                        <span class="tooltiptext" style="font-size: 15px;">Thêm vào giỏ</span>
                        +
                    </button>
                </div>
            </a>
            </li>';
        }
}