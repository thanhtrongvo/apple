<?php
function addHeader()
{
    echo '
                <header class="header">
                    <div class="grid">
                        <nav class="header__navbar">
                            <ul class="header__navbar-list">
                                <li class="header__navbar-item .header__navbar-item--strong ">
                                    <a href="index.php" class="header__navbar-logo">
                                        <i class="header__navbar-item-logo fa-brands fa-apple "></i>
                                    </a>
                                </li>
                                <li class="header__navbar-item">
                                    <form action="search.php" method="post" class="header__navbar-mac">
                                    <button type="text" name="searchInput"value="Mac" >Mac</button>
                                    </form>
                                </li>
                                <li class="header__navbar-item">
                                    <form action="search.php" method="post" class="header__navbar-ipad">
                                    <button type="submit" name="searchInput"value="Ipad" >IPad</button>
                                    </form>
                                </li>
                                <li class="header__navbar-item">
                                    <form action="search.php" method="post" class="header__navbar-iphone">
                                    <button type="submit" name="searchInput"value="IPhone" >IPhone</button>
                                    </form>
                                </li>
                                <li class="header__navbar-item">
                                    <form action="search.php" method="post" class="header__navbar-watch">
                                    <button type="submit" name="searchInput"value="Watch" >Watch</button>
                                    </form>
                                </li>
                                <li class="header__navbar-item">
                                    <form action="search.php" method="post" class="header__navbar-airpot">
                                    <button type="submit" name="searchInput"value="Airpots" >Airpods</button>
                                    </form>
                                </li>
                                <li class="header__navbar-item">
                                    <a href="admin/logout.php" class="header__navbar-support">
                                        Support
                                    </a>
                                </li>
                                ';
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['name'])) {
        echo '<li class="header__navbar-item">
                                    <a onclick="showModal()" class="header__navbar-login">
                                        Join us
                                    </a>
                                ';
    } else {
        echo '<li class="header__navbar-item">
                                    <a onclick="showInfo()" class="header__navbar-logout">
                                    ' . $_SESSION['name'] . '
                                    </a>
                                </li>';
    }
    echo '
                                <li class="header__navbar-item">
                                    <a href="cart.php" class="header__navbar-cart">
                                        Cart
                                    </a>
                                </li>
                                <li class="header__navbar-item ">
                                    <form method="POST" action="search.php">
                                    <div class="search-box">
                                        <input type="text" name="searchInput"></input>
                                        <span></span>
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </header>';
}

function addContainer()
{
    echo '<div class="container">
        <div class="container__content">
            <div class="container__content-ip14--video">
                <video src="video/Ad_iphone14pro.mp4" loop="" autoplay="" muted="" width="100%"></video>
            </div>
            <div class="container__content-ip14--btn">
                <a href="product_detail.php?id=2">
                    <button class="hide__btn">
                        BUY
                    </button>
                </a>
            </div>
        </div>

        <div class="container__content-watch">
            <div class="container__content-watch--photo">
                <img src="img/Apple-Watch-Ultra-Feature-Image.jpg" alt="">
            </div>
            <div class="container__content-watch--btn">
                <a href="product_detail.php?id=29">
                    <button class="hide__btn">
                        BUY
                    </button>
                </a>
            </div>
        </div>
        <div class="container__content-last">
            <div class="row container__content-last--list">
                <div class="col col-half s-col-full">
                    <img src="img/AdMac.png" alt="Mac" class="container__content-last--img">                    
                </div>
                <div class="container__content-mac--btn">
                    <a href="product_detail.php?id=12">
                        <button class="hide__btn">
                            BUY
                        </button>
                    </a>
                </div>
                <div class="col col-half s-col-full">
                    <img src="img/AdIpad.png" alt="Ipad" class="container__content-last--img">                    
                </div>
                <div class="container__content-ipad--btn">
                    <a href="product_detail.php?id=22">
                        <button class="hide__btn">
                            BUY
                        </button>
                    </a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
';
}

function addProduct()
{
    if (isset($_GET['category'])) {
        echo ' <div class="product">
            <div class="product__content">
                <h1 class="product__content-heading" id="product__content-heading" style="text-transform: uppercase;">all ';
        echo $_GET['namecate'];
        echo '</h1>
                <div class="product__content-iphone">
                    <div class="home__product">
                        <ul>';
        select_category();
        echo '</ul>
                    </div>
                </div>
                </div>';
    } else {
        echo '
        <div class="product">
            <div class="product__content">
                <h1 class="product__content-heading">NEW IPHONE</h1>
                <div class="product__content-iphone">
                    <div class="home__product">
                        <ul>';
        product_home("23");
        echo '</ul>
                        <div class="view_all">
                            <a href="index.php?category=23&namecate=iphone">
                                View all
                            </a>
                        </div>
                    </div>
                </div>
                <h1 class="product__content-heading">NEW WATCH</h1>
                <div class="product__content-watch">
                    <div class="home__product">
                        <ul>';
        product_home("24");
        echo '  </ul>
                        <div class="view_all">
                            <a href="index.php?category=24&namecate=watch">
                                View all
                            </a>
                        </div>
                    </div>
                </div>

                <h1 class="product__content-heading">NEW IPAD</h1>
                <div class="product__content-ipad">
                    <div class="home__product">
                        <ul>';
        product_home("18");
        echo ' </ul>
                        <div class="view_all">
                            <a href="index.php?category=18&namecate=ipad">
                                View all
                            </a>
                        </div>
                    </div>
                </div>

                <h1 class="product__content-heading">NEW MAC</h1>
                <div class="product__content-mac">
                    <div class="home__product">
                        <ul>';
        product_home("19");
        echo '</ul>
                        <div class="view_all">
                            <a href="index.php?category=19&namecate=macbook">
                                View all
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    ';
    }
}
function addFooter()
{
    echo '<div id="footer">
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
                    <li><a href=""><i class="bx bxl-facebook-circle"></i> Facebook</a></li>
                    <li><a href=""><i class="bx bxl-instagram-alt"></i> Instagram</a> </li>
                    <li><a href=""><i class="bx bxl-youtube"></i> Youtube</a> </li>
                    <li><a href=""><i class="bx bxl-twitter"></i> Twitter</a></li>
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
    </div>';
}

function addModal()
{
    echo ' <div id="modal" class="modal">
        <div class="modal__body">
            <div class="auth-form">
                <input type="checkbox" id="chk" aria-hidden="true">
                <i onclick="exitModal()" class="fa-solid fa-xmark auth-form__btn--cancel"></i>
                <div class="auth-form__signup">
                    <form method="post" id="signup" onsubmit="">
                        <label for="chk" aria-hidden="true">Join Us</label>
                        <input type="text" name="name" placeholder="Full Name" >
                        <input type="text" name="phone" placeholder="Phone Number" >
                        <input type="email" name="email" placeholder="Email" >
                        <input type="password" name="pswd" placeholder="Password" >
                        <button type="submit" name="signup">Sign up</button>
                    </form>
                </div>
                <div class="auth-form__login">
                    <form id="signin" method="post" onsubmit="">
                        <label for="chk" aria-hidden="true">Sign In</label>
                        <input type="email" name="email1" placeholder="Email" >
                        <input type="password" name="pswd1" placeholder="Password" >
                        <button type="submit" name="signin">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>';
}

function addInfoModal()
{
    echo '<div id="modal__in4" class="modal__in4">
        <div class="modal__body__in4">
            <div class="auth-form__in4">
                <i onclick="exitModalInfo()" class="fa-solid fa-xmark auth-form__btn--cancel"></i>
                <form method="post">
                <h1> Information: </h1>';


    if (isset($_SESSION['name'])) {
        echo " <p>Full Name: " . $_SESSION['name'] . "</p>";
    }
    if (isset($_SESSION['phone'])) {
        echo " <p >Phone: " . $_SESSION['phone'] . "</p>";
    }
    if (isset($_SESSION['email'])) {
        echo " <p >Email: " . $_SESSION['email'] . "</p>";
    }
    if (isset($_SESSION['pswd'])) {
        echo " <p >Password: " . $_SESSION['pswd'] . "</p>";
    }
    echo '
                    <button type="button" onclick="location.href=\'admin/logout.php\';" name="Logout">Log out</button>
                </form>
            </div>
        </div>
    </div>';
}

function addLoader()
{
    echo '<div class="loading-wrapper">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
            ';
}