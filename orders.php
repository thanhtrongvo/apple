<?php 
    include('database/connection.php');
    include('php/signup.php');
    include('php/signin.php');
    include('php/mainHtml.php');
    include("php/cart.php");
    include('php/product.php');
    include('php/logout.php');
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/login.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        
        .cart-wrap {
            padding: 40px 0;
            font-family: 'Open Sans', sans-serif;
        }

        .main-heading {
            font-size: 19px;
            margin-bottom: 20px;
        }

        .table-cart table {
            width: 150%;
        }

        .table-cart thead {
            border-bottom: 1px solid #e5e5e5;
            margin-bottom: 5px;
        }

        .table-cart thead tr th {
            padding: 8px 0 18px;
            color: #484848;
            font-size: 15px;
            font-weight: 400;
        }

        .table-cart tr td {
            padding: 40px 0 27px;
            vertical-align: middle;
        }

        .table-cart tr td:nth-child(1) {
            width: 15%;
        }

        .table-cart tr td:nth-child(2) {
            width: 22%;
        }

        .table-cart tr td:nth-child(3) {
            width: 14%;
        }

        .table-cart tr td:nth-child(4) {
            width: 19%;
        }

        .table-cart tr td:nth-child(5) {
            width: 20%;
        }

        .table-cart tr td:nth-child(6) {
            width: 20%;
        }
        .table-cart tr td .img-product {
            width: 72px;
            float: left;
            margin-left: 8px;
            margin-right: 31px;
            line-height: 63px;
        }

        .table-cart tr td .img-product img {
            width: 100%;
        }

        .table-cart tr td .name-product {
            font-size: 15px;
            color: #484848;
            padding-top: 8px;
            line-height: 24px;
            width: 100%;
        }

        .table-cart tr td .price {
            text-align: right;
            line-height: 64px;
            margin-right: 40px;
            color: #989898;
            font-size: 16px;
            font-family: 'Nunito';
        }

        .table-cart tr td .quanlity {
            position: relative;
        }

        .product-count .qtyminus,
        .product-count .qtyplus {
            width: 34px;
            height: 34px;
            background: transparent;
            text-align: center;
            font-size: 19px;
            line-height: 34px;
            color: #000;
            cursor: pointer;
            font-weight: 600;
            border:none;
        }

        .product-count .qtyminus {
            line-height: 32px;
        }

        .product-count .qtyminus {
            border-radius: 3px 0 0 3px;
        }

        .product-count .qtyplus {
            border-radius: 0 3px 3px 0;
        }

        .product-count .qty {
            width: 160px;
            height:100px;
            text-align: center;
            border: solid 2px black;
            border-radius: 10px;
        }

        .count-inlineflex {
            display: inline-flex;
        }

        .total {
            font-size: 24px;
            font-weight: 600;
            color: #8660e9;
        }

        .display-flex {
            display: flex;
        }

        .align-center {
            align-items: center;
        }

        .coupon-box {
            padding: 63px 0 58px;
            text-align: center;
            border: 2px dotted #e5e5e5;
            border-radius: 10px;
            margin-top: 55px;
        }

        .coupon-box form input {
            display: inline-block;
            width: 264px;
            margin-right: 13px;
            height: 44px;
            border-radius: 25px;
            border: solid 2px #cccccc;
            padding: 5px 15px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            box-shadow: none;
        }

        .round-black-btn {
            border-radius: 25px;
            background: #212529;
            color: #fff;
            padding: 8px 35px;
            display: inline-block;
            border: solid 2px #212529;
            transition: all 0.5s ease-in-out 0s;
            cursor: pointer;
        }

        .round-black-btn:hover,
        .round-black-btn:focus {
            background: transparent;
            color: #212529;
            text-decoration: none;
        }

        .cart-totals {
            border-radius: 3px;
            background: #e7e7e7;
            padding: 25px;
        }

        .cart-totals h3 {
            font-size: 19px;
            color: #3c3c3c;
            letter-spacing: 1px;
            font-weight: 500;
        }

        .cart-totals table {
            width: 100%;
        }

        .cart-totals table tr th,
        .cart-totals table tr td {
            width: 50%;
            padding: 3px 0;
            vertical-align: middle;
        }

        .cart-totals table tr td:last-child {
            text-align: right;
        }

        .cart-totals table tr td.subtotal {
            font-size: 20px;
            color: #6f6f6f;
        }

        .cart-totals table tr td.free-shipping {
            font-size: 14px;
            color: #6f6f6f;
        }

        .cart-totals table tr.total-row td {
            padding-top: 25px;
        }

        .cart-totals table tr td.price-total {
            font-size: 24px;
            font-weight: 600;
            color: #8660e9;
        }

        .btn-cart-totals {
            text-align: center;
            margin-top: 60px;
            margin-bottom: 20px;
        }

        .btn-cart-totals .round-black-btn {
            margin: 10px 0;
        }
        .hiden {
            height: 50px;
        }
    </style>
</head>

<body>
    <header>
        <div class="hiden">

        </div>
        <?php addHeader(); ?>
    </header>
    <div class="cart-wrap">
        <div class="container">
            <div class="row" >
                <div class="col-lg-8">
                    <div class="main-heading">Orders</div>
                    <div class="table-cart">
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>Note</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="cartbody">
                                <?php 
                                $usrid = $_SESSION['id'];
                                $result = mysqli_query($conn,"SELECT * FROM `orders` WHERE user_id = '$usrid';");
                                $rs = mysqli_fetch_all($result,MYSQLI_ASSOC);
                                foreach ($rs as $row) {
                                    //vòng for in danh sách giỏ hảng
                                        echo '<tr>
                                            <td>
                                                <div class="display-flex align-center">
                                                    <div class="img-product">
                                                        <img src="img/logo.png" alt="" class="mCS_img_loaded">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="display-flex align-center">
                                                    <div class="name-product">'.$row['fullname'].
                                                    '</div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="display-flex align-center">
                                                    <div class="name-product">'.$row['phone_number'].
                                                    '</div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="display-flex align-center">
                                                <div class="name-product">'.$row['order_date'].
                                                    '</div>
                                                </div>
                                            </td>
                                            <td class="product-count">
                                                <div  class="count-inlineflex" >
                                                    <input type="text" name="quantity" value="'.$row['note'].'" class="qty">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="total">$'.number_format($row['total_money'],0,',').
                                            '</div>
                                            </td>
                                            <td>
                                                <a href="#" title="">
                                                    <img src="images/icons/delete.png" alt="" class="mCS_img_loaded">
                                                </a>
                                            </td>
                                        </tr>';
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal_checkout" class="modal__in4" >
        <div class="modal__body__in4">
            <div class="auth-form__in4">
                <i onclick="exitck()" class="fa-solid fa-xmark auth-form__btn--cancel"></i>
                <form method="GET" action="php/cart-process.php">
                <h1> Checkout </h1>
                    <label > Địa chỉ: </label>
                    <input type="text" name="addr" > </input>
                    <label > Ghi chú: </label>
                    <input type="text" name="note" > </input>
                    <button type="submit" name="order">Order</button>
                </form>
            </div>
        </div>
    </div>
    <?php 
    addInfoModal();
    addFooter(); ?>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>