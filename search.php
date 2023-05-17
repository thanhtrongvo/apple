<?php
require_once('database/connection.php');
include('php/signup.php');
include('php/signin.php');
include("php/cart.php");
include('php/product.php');
include('php/logout.php');
include('php/mainHtml.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/reponsive.css">
    <link rel="stylesheet" href="css/home_products.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/png" href="img/logo.png">
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/fontawesome.css">
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.css">
    <script src="plugins/jquery/jquery.js"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-validation/jquery.validate.js"></script>
    <script src="plugins/jquery/jquery.js"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <style>
        .product{
            margin-top:5vh;
            height: 120vh;
        }
        .product_leftmenu{
            width:15%;
            float:left;
            height:100%;
            border:1px black solid;
            box-sizing: border-box;
            font-size:15pt;
            background-color: #868686;
        }
        .product__content{
            position:relative;
            border:solid 1px black;
            height:fit-content;
            float: left;
            width: 85%;
            box-sizing: border-box;
        }
        .product__content-heading{
            display:block;
            font-size:30pt;
            width:100vw;
        }
        body{
            font-family:"Helvetica Neue", HelveticaNeue, Helvetica, Arial, sans-serif;
            font-size:14px;}
        .link {
            padding: 10px 15px;
            background: transparent;
            border:#bccfd8 1px solid;
            border-left:0px;
            cursor:pointer;
            color:#607d8b}
        .disabled { 
            cursor:not-allowed;
            color: #bccfd8;}
        .current {
            background: #bccfd8;}
        .first{
            border-left:#bccfd8 1px solid;}
        #pagination{
            position:relative;
            margin-left:60px;
            clear:both;
        }
        .dot {
            padding: 10px 15px;
            background: transparent;
            border-right: #bccfd8 1px solid;}
        #overlay {
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 999;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            display: none;}
        #overlay div {
            position:absolute;
            left:50%;top:50%;margin-top:-32px;margin-left:-32px;}
        .page-content {
            padding: 20px;margin: 0 auto;}
        .pagination-setting {
            padding:10px; 
            margin:5px 0px 10px;
            border:#bccfd8  1px solid;
            color:#607d8b;
        }
        .list-group{
            font-size:12.5pt;
            width: 100%;
            height: 30px;
            margin-top:20px ;
            margin-bottom:20px ;

        }
        .home__product--info{
            width: 20%;
        }
        .header__navbar-item:last-child {
            display:none;
        }
        .searchbar{

        }
        .searchbar input{
            background-color: white;
            width: 100%;
            margin-top: 20px;
        }
        .searchbar button{
            margin-top: 10px;

            width: 100%;
            background-color: white;
        }
        .searchbar button:hover{
            opacity: 0.7;
        }
    </style>

</head> 

<body>
    <?php 
        if(isset($_POST['searchInput'])){
            $searchInput = $_POST['searchInput'];
        }
    ?>
    <div class="app">
        <?php addHeader(); ?>
        <div class="product">
            <h1 class="product__content-heading">Result</h1>
            <div class="product_leftmenu">
                <div class="searchbar">
                    <?php 
                        if(isset($_POST['searchInput']))
                            echo '<input type="text" id="searchInput" placeholder="Tìm kiếm..." value="'.$searchInput.'"></input>';
                        else
                            echo '<input type="text" id="searchInput" placeholder="Tìm kiếm..."></input>';
                    ?>
                    <button  name="search" onclick="search()">
                        <i class="header__navbar-item-logo--smaller header__navbar-item-logo fa-solid fa-magnifying-glass"></i>    
                    </button>
                    
                </div>
                <select class="list-group" id="price-range">
                    <option class="list-group-item" value="0">Filter by price</option>
                    <option class="list-group-item" value="1">&#60;500$</option>
                    <option class="list-group-item" value="2">500$ - 1000$</option>
                    <option class="list-group-item" value="3">1000$ - 1500$</option>
                    <option class="list-group-item" value="4">1500$ - 2000$</option>
                    <option class="list-group-item" value="5">2000$ - 3000$</option>
                 </select>

                 <select class="list-group" id="Cate">
                    <option class="list-group-item" value="0">Filter by product</option>
                    <option class="list-group-item" value="1">Ipad</option>
                    <option class="list-group-item" value="2">Macbook</option>
                    <option class="list-group-item" value="3">Airpod</option>
                    <option class="list-group-item" value="4">Iphone</option>
                    <option class="list-group-item" value="5">Watch</option>
                 </select>
            </div>
            <div class="product__content">
                <div class="page-content">
                    <div style="border-bottom: #F0F0F0 1px solid;margin-bottom: 15px; display:none">
                    Pagination Setting:<br> <select name="pagination-setting" onChange="changePagination(this.value);" class="pagination-setting" id="pagination-setting">
                    <option value="all-links">Display All Page Link</option>
                    <option value="prev-next">Display Prev Next Only</option>
                    </select>
                    </div>
                    
                    <div class="home__product" >
                        <div id="pagination-result">
                        <li class="home__product--info">
            <a href="product_detail.php?id='.$id.'">
                <img src="' . $img . '" />
                <h3>' . $title . '</h3>
                <span class="price">' . number_format("$price", 0, ".", ".") . '<u>$</u></span>
            </a>
            <form class="form_item" >
                <input type="hidden" name="name" value="' . $title . '">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="hidden" name="price" value="' . $price . '">
                <input type="hidden" name="image" value="' . $img . '">
                <div class="tooltip">
                    <button class="themvaogio" type="button" name="add_to_cart" value="addToCart">
                        <span class="tooltiptext" style="font-size: 15px;">add to cart</span>
                        +
                    </button>
                </div>
            </form>
            </li>
                        <input type="hidden" name="rowcount" id="rowcount" />
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <?php
        addFooter();
        addModal();
        addInfoModal();
        ?>
    </div>
    <div id="overlay"><div><img src="video\loading.gif" width="64px" height="64px"/></div></div>
</body>
<script>

function getresult(url) {
	$.ajax({
		url: url,
		type: "GET",
		data:  {rowcount:$("#rowcount").val(),"pagination_setting":$("#pagination-setting").val(),"priceRange":$("#price-range").val(),"searchInput":$('#searchInput').val()},
		beforeSend: function(){$("#overlay").show();},
		success: function(data){
            if(data != "false"){
                $("#pagination-result").html(data);
                setInterval(function() {
                $("#overlay").hide(); },500);
            } else {
                $("#pagination-result").html("No data");
            }
		},
		error: function() 
		{}
   });
}
function changePagination(option) {
	if(option!= "") {
		getresult("php/getresult.php");
	}
}
function search(){
		getresult("php/getresult.php");
}
getresult("php/getresult.php");
</script>
<script src="plugins/jquery/jquery.js"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-validation/jquery.validate.js"></script>

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="js/validate.js"></script>
<script src="js/cart.js"></script>
<script src="js/login.js"> </script>    


</html>