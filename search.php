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
        .product_content{
            float:left;
            width:50%;
            height:70vh;
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
            <div class="product_leftmenu">
            <ul class="list-group">
                <li class="list-group-item" value="1">1.000.000đ - 10.000.000đ</li>
                <li class="list-group-item" value="2">10.000.000đ - 20.000.000đ</li>
                <li class="list-group-item" value="3">20.000.000đ - 30.000.000đ</li>
                <li class="list-group-item" value="4">30.000.000đ - 40.000.000đ</li>
                <li class="list-group-item" value="5">40.000.000đ - 50.000.000đ</li>
                </ul>
            </div>
            <div class="product__content">
                <?php
                    if(ISSET($_POST['search'])){
                        $keyword = $_POST['searchInput'];
                        $query = mysqli_query($conn, "SELECT * FROM `product` WHERE `title` LIKE '%$keyword%' ORDER BY `title`") or die(mysqli_error());
                        if(mysqli_num_rows($query) > 0)
                            while($row = mysqli_fetch_array($query)){
                            innerProduct($row['thumbnail'],$row['title'],$row['price'],$row['id']);
                            }
                        else
                            product_all();
                    }

              $records_per_page = 8;
            //   $sql = "SELECT * FROM Product";
            //   $result = mysqli_query($conn, $sql);
            //   $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
              $total_records = mysqli_num_rows($result);
              $total_pages = ceil($total_records / $records_per_page);
              $page = isset($_GET['page']) ? $_GET['page'] : 1;
              $start = ($page - 1) * $records_per_page;
              $sql = "SELECT * FROM Product LIMIT $start, $records_per_page";
              $result = mysqli_query($conn, $sql);
              $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
              if (mysqli_num_rows($result) > 0) {
                    foreach ($data as $row) {
                      echo "<td>" . $row['id'] . "</td>";
                      echo "<td>" . $row['title'] . "</td>";
                      echo "<td>" . number_format($row['price'])  . "đ</td>";
                      echo "<td> <img class='img-product' src='../".$row['thumbnail']. "'</td>";
                      echo "<td>" . $row['option'] . "</td>";
                      echo "<td><small>" . $row['decription'] . "</small></td>";
                      if ($row['status'] == 0) {
                        echo "<td><span class='badge badge-danger'>Private </span></td>";
                      } elseif ($row['status'] == 1) {
                        echo "<td><span class='badge badge-success'>Public </span>";
                      }
                      echo "<td class='text-right'>";
                      echo "<a href='edit_product.php?id=" . $row['id'] . "' class='btn btn-sm btn-success'>
                          <i class='fas fa-edit'></i>
                      </a> ";
                      echo "<a onclick='return confirm(\"Are you sure to delete this item?\");'  id='btn_destroy'  href='all_product.php?action=delete&id=" . $row['id'] . "' class='btn btn-sm btn-danger btn-destroy'>
                          <i class='fas fa-trash'></i>
                      </a>
                  </td>
    
    
                      </tr>";
                    }
              }
                ?>
                
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