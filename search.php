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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="img/logo.png">

    <style>
        .product{
            margin-top:5vh;
            height: 100vh;
        }
        .product_leftmenu{
            width:10%;
            float:left;
            height:65vh;
            border:1px black solid;
        }
        .product__content{
            margin-left: 100px;
            width:100%;
            height:100vh;
            overflow: scroll;
        }
        .product__content-heading{
            display:block;
            font-size:30pt;
            width:100vw;
        }
        .pagination{
            padding-top: 7vh;
        }
        .list-group-item{
            font-size:15pt;
        }
        
        *{
            border:none;
        }
    </style>
</head>

<body>
    <div class="app">
        <?php addHeader(); ?>
        <div class="product">
            <h1 class="product__content-heading">Product</h1>
            <!-- <div class="product_leftmenu">
            <ul class="list-group">
                <li class="list-group-item" value="1">1.000.000đ - 10.000.000đ</li>
                <li class="list-group-item" value="2">10.000.000đ - 20.000.000đ</li>
                <li class="list-group-item" value="3">20.000.000đ - 30.000.000đ</li>
                <li class="list-group-item" value="4">30.000.000đ - 40.000.000đ</li>
                <li class="list-group-item" value="5">40.000.000đ - 50.000.000đ</li>
                </ul>
            </div> -->
            <div class="product__content">
                <?php
                         $keyword = $_POST['searchInput'];
                         $query = mysqli_query($conn, "SELECT * FROM `product` WHERE `title` LIKE '%$keyword%' ORDER BY `title`") or die(mysqli_error());
                        // $records_per_page = 8;
                        // $total_records = mysqli_num_rows($query);
                        // $total_pages = ceil($total_records / $records_per_page);
                        // $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        // $start = ($page - 1) * $records_per_page;
                        // echo "$total_records $total_pages $page";
                        // $query = mysqli_query($conn, "SELECT * FROM `product` WHERE `title` LIKE '%$keyword%' ORDER BY `title`  LIMIT $start, $records_per_page") or die(mysqli_error());
                        if(mysqli_num_rows($query) > 0){
                            while($row = mysqli_fetch_array($query))
                            innerProduct($row['thumbnail'],$row['title'],$row['price'],$row['id']);
                        }
                        else{
                            product_all();
                        }
            
                        // }
                        //         //   $sql = "SELECT * FROM Product";
                        // //   $result = mysqli_query($conn, $sql);
                        // // //   $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        // //   $total_pages = ceil($total_records / $records_per_page);
                        // //   $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        // //   $start = ($page - 1) * $records_per_page;
                        // //   $sql = "SELECT * FROM Product LIMIT $start, $records_per_page";
                        // //   $result = mysqli_query($conn, $sql);
                        // //   $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        // echo '<nav  aria-label="Page navigation example">
                        // <ul class="pagination">' ;
                        // if ($page > 1) {
                        //     echo '<li class="page-item">
                        //     <a class="page-link" href="search.php?page=' . $page - 1 .'"" aria-label="Previous">
                        //         <span aria-hidden="true">&laquo;</span>
                        //         <span class="sr-only">Previous</span>
                        //     </a>
                        //     </li>';
                        // }
                        // elseif($page == 1) {
                        //     echo '<li class="page-item disabled">
                        //     <a class="page-link" href="#" aria-label="Previous">
                        //     <span aria-hidden="true">&laquo;</span>
                        //     <span class="sr-only">Previous</span>
                        //     </a>
                        // </li>';
                        // }
                        //     for ($i = 1; $i <= $total_pages; $i++) {
                        //     echo "<li class='page-item'><a class='page-link' href='search.php?page=" . $i . "'>" . $i . "</a></li>";
                        //     }
                        // echo' <li class="page-item">
                        //     <a class="page-link" href="all_product.php?page=' . $page +  1 .'"" aria-label="Next">
                        //         <span aria-hidden="true">&raquo;</span>
                        //         <span class="sr-only">Next</span>
                        //     </a>
                        //     </li>
                        // </ul>
                        // </nav>';
                        //product_all();
            
                ?>
                <div>
                </div>
            </div>
        </div>
        <?php
        addFooter();
        addModal();
        addInfoModal();
        ?>
    </div>

</body>
<script src="js/login.js"> </script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="plugins/jquery/jquery.js"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="js/cart.js"></script>
<script src="js/validate.js"></script>


</html>