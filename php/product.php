<?php 
function product_all(){
    include('database/connection.php');
    $syn = "SELECT * FROM `product`";
    $result = mysqli_query($conn,$syn);
        
            while($row = mysqli_fetch_array($result))
            innerProduct($row['thumbnail'],$row['title'],$row['price'],$row['id']);
            
        
}
function product_home($id){
    include('database/connection.php');
    $syn = "SELECT * FROM `product` WHERE category_id = '$id'";
    $result = mysqli_query($conn,$syn);
        for($i=0; $i <4; $i++ ){
            $row = mysqli_fetch_array($result);
            innerProduct($row['thumbnail'],$row['title'],$row['price'],$row['id']);
            
        }
}
function innerProduct($img, $title, $price, $id){
    echo
            '<li class="home__product--info">
            <a href="">
                <img src="'.$img.'" />
                <h3>'.$title.'</h3>
                <span class="price">'.number_format("$price",0,".",".").'<u>đ</u></span>
            </a>
            <form class="form_item" method="post">
                <input type="hidden" name="name" value="'.$title.'">
                <input type="hidden" name="id" value="'.$id.'">
                <input type="hidden" name="price" value="'.$price.'">
                <input type="hidden" name="image" value="'.$img.'">
                <div class="tooltip">
                    <button class="themvaogio" type="submit" name="add_to_cart" value="addToCart">
                        <span class="tooltiptext" style="font-size: 15px;">Thêm vào giỏ</span>
                        +
                    </button>
                </div>
            </form>
            </li>
            ';
}
function toStringProduct($img, $title, $price, $id){
    return 
            '<li class="home__product--info">
            <a href="">
                <img src="'.$img.'" />
                <h3>'.$title.'</h3>
                <span class="price">'.number_format("$price",0,".",".").'<u>đ</u></span>
            </a>
            <form class="form_item" method="post">
                <input type="hidden" name="name" value="'.$title.'">
                <input type="hidden" name="id" value="'.$id.'">
                <input type="hidden" name="price" value="'.$price.'">
                <input type="hidden" name="image" value="'.$img.'">
                <div class="tooltip">
                    <button class="themvaogio" type="submit" name="add_to_cart" value="addToCart">
                        <span class="tooltiptext" style="font-size: 15px;">Thêm vào giỏ</span>
                        +
                    </button>
                </div>
            </form>
            </li>';
}
function select_category() {
    include('database/connection.php');
    if(isset($_GET['category'])){
        $cate = $_GET['category'];
    product_home($cate);
}
}

?>
