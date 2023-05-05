<?php
include('database/connection.php');
include('php/signup.php');
include('php/signin.php');
include('php/product.php');
include('php/cart.php');
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
    <link rel="stylesheet" href="css/home_products.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/png" href="img/logo.png">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="app">
        <header class="header">
            <div class="grid">
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item .header__navbar-item--strong ">
                            <a href="" class="header__navbar-logo">
                                <i class='header__navbar-item-logo fa-brands fa-apple '></i>
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-mac">
                                Mac
                            </a>
                            <ul class="header__subnav-mac">
                                <li><p>Explore Mac</p></li>
                                <li><a href="">MacBook Air</a></li>
                                <li><a href="">MacBook Pro</a></li>
                                <li><a href="">iMac</a></li>
                                <li><a href="">Mac Mini</a></li>
                            </ul>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-ipad">
                                Ipad
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-iphone">
                                Iphone
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-watch">
                                Watch
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-airpod">
                                Airpod
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-support">
                                Support
                            </a>
                        </li>
                        <?php
                        if (!isset($_SESSION['name'])) {
                            echo '<li class="header__navbar-item">
                            <a onclick="showModal()" class="header__navbar-login">
                                Join us
                            </a>
                        ';
                        } else {
                            echo '<li class="header__navbar-item">
                            <a href="admin/logout.php" class="header__navbar-logout">
                            ' . $_SESSION['name'] . '
                            </a>
                        </li>';
                        }
                        ?>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-cart">
                                Cart
                            </a>
                        </li>
                        <li class="header__navbar-item ">
                            <a href="" class=" header__navbar-search">
                                <i class='header__navbar-item-logo--smaller header__navbar-item-logo fa-solid fa-magnifying-glass'></i>    
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            
        </header>
<body >
    <div style="height: 450px">
        <?php
            displayCart(); 
        ?>
    </div>
</body>
<div id="footer">
        <div class="footer__content">
            <div class="footer__content--link">
                <ul>
                    <h2>Product</h2>
                    <li><a href="">MAC</a></li>
                    <li><a href="">IPAD</a></li>
                    <li><a href="">IPHONE</a></li>
                    <li><a href="">WATCH</a></li>
                    <li><a href="">AIRPOD</a></li>
                </ul>
            </div>
            <div class="footer__content--link">
                <ul>
                    <h2>About Apple</h2>
                    <li><a href="">Newsroom</a></li>
                    <li><a href="">Career Opportunities</a> </li>
                    <li><a href="">Investors</a></li>
                    <li><a href="">Contact Apple </a></li>
                </ul>
            </div>
            <div class="footer__content--link">
                <ul>
                    <h2>Social</h2>
                    <li><a href=""><i class='bx bxl-facebook-circle'></i> Facebook</a></li>
                    <li><a href=""><i class='bx bxl-instagram-alt'></i> Instagram</a> </li>
                    <li><a href=""><i class='bx bxl-youtube'></i> Youtube</a> </li>
                    <li><a href=""><i class='bx bxl-twitter'></i> Twitter</a></li>
                </ul>
            </div>
            <div class="footer__content--link">
                <ul>
                    <h2>Create By</h2>
                    <li><a href="">Thanh Phong</a> </li>
                    <li><a href="">Thanh Trọng</a> </li>
                    <li><a href="">Nhật Khải</a> </li>
                    <li><a href="">Khôi Nguyên</a> </li>
                </ul>
            </div>
        </div>
    </div>