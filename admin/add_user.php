<?php
include('../database/connection.php');
if (isset($_POST['submit'])) {

    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone_number'];
    $status = $_POST['status'];
    $role = $_POST['role'];
    $nameErr = $emailErr = $passwordErr = $phoneErr = $statusErr = $roleErr = "";
    // Validate form data
    if (empty($name)) {
        $nameErr = "Name is required";
    }
    if (empty($email)) {
        $emailErr = "Email is required";
    }
    if (empty($password)) {
        $passwordErr = "Password is required";
    }
    if (empty($phone)) {
        $phoneErr = "Phone is required";
    }
    if (empty($role)) {
        $roleErr = "Role is required";
    }
    if (is_numeric($name) == false) {
        $nameErr = "Name is invalid";
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $emailErr = "Email is invalid";
    }
    if (is_numeric($phone) == false) {
        $phoneErr = "Phone is invalid";
    }
    if ($role != 1 && $role != 2) {
        $roleErr = "Role is invalid";
    }

    if (empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($phoneErr) && empty($statusErr) && empty($roleErr)) {
        // Insert data into database
        $sql = "INSERT INTO `user`(`fullname`, `email`, `password`, `phone_number`, `status`,`role_id`) VALUES ('$name','$email','$password','$phone','$status','$role')";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        } else {
            echo "<script> alert('Add success') </script>";
            echo "<script> window.location.href='all_user.php' </script>";
        }
    }
}
if(isset($_GET['id'])&&$_GET['action']=='delete') {
    $id = $_GET['id'];
    $sql = "DELETE FROM `user` WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        echo "<script> alert('Delete success') </script>";
        echo "<script> window.location.href='all_user.php' </script>";
    }
}


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
                            <h1>Add User</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add User </li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <form method="post" role="form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">Name</label>
                                *
                                <input name="fullname" type="text" class="form-control" placeholder="">
                                <?php
                                if (isset($nameErr)) {
                                    echo "<span class='text-danger'> $nameErr </span>";
                                }
                                ?>
                            </div>
                            <div class="col">
                                <label for="">Email</label>
                                *
                                <input name="email" type="text" class="form-control" placeholder="">
                                <?php
                                if (isset($emailErr)) {
                                    echo "<span class='text-danger'> $emailErr </span>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Password</label>
                            *
                            <input name="password" type="text" class="form-control" placeholder="">
                            <?php
                            if (isset($passwordErr)) {
                                echo "<span class='text-danger'> $passwordErr </span>";
                            }
                            ?>
                        </div>
                        <div class="col">
                            <label for="">Role</label>
                            *
                            <input name="role" type="text" class="form-control" placeholder="">
                            <small id="emailHelp" class="form-text text-muted">* 1 is admin - 2 is customer</small>
                            <?php
                            if (isset($roleErr)) {
                                echo "<span class='text-danger'> $roleErr </span>";
                            }
                            ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                        <div class="form-group">
                                <label for="">Phone</label>
                                *
                                <input name="phone_number" type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
                                <?php
                                if (isset($phoneErr)) {
                                    echo "<span class='text-danger'> $phoneErr </span>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col">
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
                        </div>

                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <small id="emailHelp" class="form-text text-muted">* Required</small>

                </form>



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