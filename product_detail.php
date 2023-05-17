<!------ Include the above in your HEAD tag ---------->
<?php
include('database/connection.php');
include('php/signup.php');
include('php/signin.php');
include("php/cart.php");
include('php/product.php');
include('php/logout.php');
include('php/mainHtml.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE id = $id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $title = $row['title'];
    $price = $row['price'];
    $thumbnail = $row['thumbnail'];
    $decription = $row['decription'];
    $option = $row['option'];
    $category_id = $row['category_id'];
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Product Detail</title>
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        

        .section {
            width: 100%;
            margin-left: -15px;
            padding: 2px;
            padding-left: 15px;
            padding-right: 15px;
            background: #f8f9f9
        }


        .btn-minus {
            cursor: pointer;
            font-size: 7px;
            display: flex;
            align-items: center;
            padding: 5px;
            padding-left: 10px;
            padding-right: 10px;
            border: 1px solid gray;
            border-radius: 2px;
            border-right: 0;
        }

        .btn-plus {
            cursor: pointer;
            font-size: 7px;
            display: flex;
            align-items: center;
            padding: 5px;
            padding-left: 10px;
            padding-right: 10px;
            border: 1px solid gray;
            border-radius: 2px;
            border-left: 0;
        }

        div.section>div {
            width: 100%;
            display: inline-flex;
        }

        div.section>div>input {
            margin: 0;
            padding-left: 5px;
            font-size: 10px;
            padding-right: 5px;
            max-width: 18%;
            text-align: center;
        }

        .container__detail{
            height: fit-content;
            margin: 10%;
        }

        .container__detail .Container__detail--product{
            width: 100%;
            float: left;
        }
        .container__detail--product-photo{
        }
        .container__detail--product-dec{
            padding: 7%;
        }
    </style>
</head>


<body>
    <header>
        <div class="hiden">

        </div>
        <?php addHeader(); ?>
    </header>
    <div class="container__detail">
        <h1 class="container__detail--heading">
            Product Detail
        </h1>
        <div class="container__detail--product">
            <div class="container__detail--product-photo col col-half s-col-full">
                <img style="max-width:100%;" src="<?php echo $thumbnail ?>" />
            </div>
            <div class="container__detail--product-dec col col-half s-col-full" style="border:0px solid gray">
                <h3><?php echo $title ?></h3>
                <h5 style="color:#337ab7">sale by <a href="apple.com">Apple</a> · <small style="color:#337ab7">(5054 ventas)</small></h5>

                <!-- Precios -->
                
                <h6 class="title-price"><small>Price</small></h6>
                <h3 style="margin-top:0px;"><?php echo $price ?>$</h3>

                <?php 
                    if($option == ""){
                        echo "";
                    }
                    else {
                        echo ' <div class="section" style="padding-bottom:5px;">
                        <h6 class="title-attr"><small>Option</small></h6>
                        <div>
                            <p class="attr2">';
                             echo $option ;
                             echo '</p>
                        </div>
                    </div>';
                    }

                ?>
                <div class="decription" style="padding-bottom:5px;">
                    <h6 class="title-attr"><small>Description</small></h6>
                    <div>
                        <p class="attr2"><?php echo $decription?> </p>
                    </div>
                </div>
                <div class="section" style="padding-bottom:20px;">
                    <h6 class="title-attr"><small>Quantity</small></h6>
                    <div>
                        <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                        <input value="1" />
                        <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                    </div>
                </div>

                <div class="section" style="padding-bottom:20px;">
                    <button style="background-color:#000;margin-left: -2px;" class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to Cart </button>
                </div>
            </div>

            <div class="col">
                <div style="width:100%;border-top:1px solid silver">
                    <p style="padding:15px;">
                        <small>
                            Stay connected either on the phone or the Web with the Galaxy S4 I337 from Samsung. With 16 GB of memory and a 4G connection, this phone stores precious photos and video and lets you upload them to a cloud or social network at blinding-fast speed. With a 17-hour operating life from one charge, this phone allows you keep in touch even on the go.

                            With its built-in photo editor, the Galaxy S4 allows you to edit photos with the touch of a finger, eliminating extraneous background items. Usable with most carriers, this smartphone is the perfect companion for work or entertainment.
                        </small>
                    </p>
                    <small>
                        <ul>
                            <li>Super AMOLED capacitive touchscreen display with 16M colors</li>
                            <li>Available on GSM, AT T, T-Mobile and other carriers</li>
                            <li>Compatible with GSM 850 / 900 / 1800; HSDPA 850 / 1900 / 2100 LTE; 700 MHz Class 17 / 1700 / 2100 networks</li>
                            <li>MicroUSB and USB connectivity</li>
                            <li>Interfaces with Wi-Fi 802.11 a/b/g/n/ac, dual band and Bluetooth</li>
                            <li>Wi-Fi hotspot to keep other devices online when a connection is not available</li>
                            <li>SMS, MMS, email, Push Mail, IM and RSS messaging</li>
                            <li>Front-facing camera features autofocus, an LED flash, dual video call capability and a sharp 4128 x 3096 pixel picture</li>
                            <li>Features 16 GB memory and 2 GB RAM</li>
                            <li>Upgradeable Jelly Bean v4.2.2 to Jelly Bean v4.3 Android OS</li>
                            <li>17 hours of talk time, 350 hours standby time on one charge</li>
                            <li>Available in white or black</li>
                            <li>Model I337</li>
                            <li>Package includes phone, charger, battery and user manual</li>
                            <li>Phone is 5.38 inches high x 2.75 inches wide x 0.13 inches deep and weighs a mere 4.59 oz </li>
                        </ul>
                    </small>
                </div>
            </div>
        </div>

    </div>
    <?php addFooter(); ?>

    <script>
        $(document).ready(function() {
            //-- Click on detail
            $("ul.menu-items > li").on("click", function() {
                $("ul.menu-items > li").removeClass("active");
                $(this).addClass("active");
            })

            $(".attr,.attr2").on("click", function() {
                var clase = $(this).attr("class");

                $("." + clase).removeClass("active");
                $(this).addClass("active");
            })

            //-- Click on QUANTITY
            $(".btn-minus").on("click", function() {
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)) {
                    if (parseInt(now) - 1 > 0) {
                        now--;
                    }
                    $(".section > div > input").val(now);
                } else {
                    $(".section > div > input").val("1");
                }
            })
            $(".btn-plus").on("click", function() {
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)) {
                    $(".section > div > input").val(parseInt(now) + 1);
                } else {
                    $(".section > div > input").val("1");
                }
            })
        })
    </script>
</body>

</html>