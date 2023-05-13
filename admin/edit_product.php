<?php
include('../database/connection.php');
include('../php/checkfile.php');

if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $decription = $_POST['decription'];
    $option = $_POST['option'];
    $status = $_POST['status'];
    $cate = $_POST['category_id'];
    $nameErr = $emailErr = $passwordErr = $phoneErr = $statusErr = $roleErr =$imageErr= "";
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $finalpath = str_replace("../", "", $target_file);
            $sql = "INSERT INTO Product (category_id,title,price,thumbnail,decription,option,status) VALUES ('$cate','$title','$price','$finalpath','$decription','$option','$status')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Product Added Successfully')</script>";
                echo "<script>window.location.href='all_product.php'</script>";
            }
        }
    }
    else {
        echo "<script>alert('File is not an image.')</script>";
    }
}
// if (isset($_POST['submit'])) {
//     $title = $_POST['title'];
//     $price = $_POST['price'];
//     $decription = $_POST['decription'];
//     $option = $_POST['option'];
//     $status = $_POST['status'];
//     $cate = $_POST['category_id'];
//     $nameErr = $emailErr = $passwordErr = $phoneErr = $statusErr = $roleErr =$imageErr= "";
//     $target_dir = "../img/";
//     $target_file = $target_dir . basename($_FILES["image"]["name"]);
//     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//     $check = getimagesize($_FILES["image"]["tmp_name"]);
//     if ($check !== false) {
//         if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
//             $finalpath = str_replace("../", "", $target_file);
//             $sql = "INSERT INTO Product (category_id,title,price,thumbnail,decription,option,status) VALUES ('$cate','$title','$price','$finalpath','$decription','$option','$status')";
//             if (mysqli_query($conn, $sql)) {
//                 echo "<script>alert('Add product successfully')</script>";
//                 header('location:all_product.php');
//             } else {
//                 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//             }
//         } else {
//             echo "Sorry, there was an error uploading your file.";
//         }
//     } else {
//         $imageErr = "File is not an image.";
//     }
// }

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <?php include('left_menu.php');  ?>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit Product</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"> Edit Product </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <form method="post" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="title">Name</label>
                                <input name="title" type="text" class="form-control" placeholder="">
                            </div>
                            <div class="col">
                                <label for="">Price</label>
                                <input name="price" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <label for="category_id">Category</label>
                            <select name="category_id" class="form-control">
                                <?php
                                $sql = "SELECT * FROM category";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <input name="image" type="file">
                        </div>
                    </div>
                    <div class="row col-md-12 col-sm-12 x_content">
                        <lable style="font-weight:700;" for="desc"> Decription </lable>
                        <textarea name="decription" id="decription" class="resizable form-control"></textarea>

                    </div>
                    <label for="">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status" value="1" checked>
                        <label class="form-check-label" for="status">
                            Public
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status" value="0" checked>
                        <label class="form-check-label" for="status">
                            Private
                        </label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                </form>
                <?php if (!empty($resMessage)) { ?>
                    <div class="alert <?php echo $resMessage['status'] ?>">
                        <?php echo $resMessage['message'] ?>
                    </div>
                <?php } ?>



            </section>
        </div>

        <footer class="main-footer">
            <?php
            include('../admin/footer.php');

            ?>
        </footer>

        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
</body>

</html>