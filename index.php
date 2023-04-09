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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" type="image/png" href="assets/img/logo.png" />
</head>
<body>
    <div class="app">
        <header class="header">
            <div class="grid">
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item .header__navbar-item--strong ">
                            <a href="" class="header__navbar-logo">
                                <i class='header__navbar-item-logo bx bxl-apple'></i>
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-mac">
                                Mac
                            </a>
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
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-join_us">
                                Join Us
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-sign_in">
                                Sign In
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-cart">
                                Cart
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class=" header__navbar-search">
                                <i class='header__navbar-item-logo bx bx-search-alt-2' ></i>
                            </a>
                        </li> 
                    </ul>
                </nav>
            </div>
        </header>
        <div class="container">
            <div class="container__content">
                <div class="container__content-ip14--video">
                    <video src="video/AdApple.mp4" loop="" autoplay="" muted=""  width="100%"></video>
                </div>
                <div class="container__content-ip14--dec">
                    <h1 href="" class="container__content-ip14--heading">iPhone 14 Pro</h1>
                    <span href="" class="container__content-ip14--text">Pro.Beyond.</span>
                </div>
                <div class="container__content-ip14--btn">
                    <button>
                        BUY
                    </button>
                </div>
            </div>
            <!-- model -->
            <div class="model">  	
                <input type="checkbox" id="chk" aria-hidden="true">
        
                    <div class="model__signup">
                        <form>
                            <label for="chk" aria-hidden="true">Sign up</label>
                            <input type="text" name="txt" placeholder="User name" required="">
                            <input type="email" name="email" placeholder="Email" required="">
                            <input type="password" name="pswd" placeholder="Password" required="">
                            <button>Sign up</button>
                        </form>
                    </div>
        
                    <div class="model__login">
                        <form>
                            <label for="chk" aria-hidden="true">Login</label>
                            <input type="email" name="email" placeholder="Email" required="">
                            <input type="password" name="pswd" placeholder="Password" required="">
                            <button>Login</button>
                        </form>
                    </div>
            </div>
            <!-- end model -->
            <div class="container__content-watch">
                <div class="container__content-watch--photo">
                    <img src="img/Apple-Watch-Ultra-Feature-Image.jpg" alt="">
                </div>
                <div class="container__content-watch--btn">
                    <button>
                        BUY
                    </button>
                </div>
            </div>
            <div class="container__content-last">
                <div class="container__content-mac">
                    <div class="container__content-mac--photo">
                        <img src="img/macbook.jpg" alt="">
                    </div>
                    <div class="container__content-mac--dec">
                        <h1 href="" class="container__content-mac--heading">MacBook Pro</h1>
                        <span href="" class="container__content-mac--text">Superchanged by M2 Pro and M2 Max</span>
                    </div>
                    <div class="container__content-mac--btn">
                        <button>
                            BUY
                        </button>
                    </div>
                </div>

                <div class="container__content-ipad">
                    <div class="container__content-ipad--photo">
                        <img src="img/ipad.jpg" alt="">
                    </div>
                    <div class="container__content-ipad--dec">
                        <h1 href="" class="container__content-ipad--heading">iPad </h1>
                        <span href="" class="container__content-ipad--text">Lovable. Drawable. Magical</span>
                    </div>
                    <div class="container__content-ipad--btn">
                        <button>
                            BUY
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <footer class="footer">
                
        </footer>
    </div>
    
</body>
</html>