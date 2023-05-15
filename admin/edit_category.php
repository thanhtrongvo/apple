<?php 
    include('../database/connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../plugins/toastr/toastr.css">
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
                            <h1>Add Category</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Category</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <?php
                    $sql = "SELECT * FROM Category WHERE id = ".$_GET['id']."";
                    $result = mysqli_query($conn, $sql);
                    $data = mysqli_fetch_row($result);
                if(isset($_POST['submit'])){
                    $name = $_POST['name'];
                    $status = $_POST['status'];
                    $sql = "UPDATE Category SET name = '$name', status = '$status' WHERE id = ".$_GET['id']."";
                    $result = mysqli_query($conn, $sql);
                    if(!$result) {
                        die("Query failed: ".mysqli_error($conn));

                    }
                    else {
                        echo "<script> alert('Update category successfully!') </script>";
                        echo "<script> window.location.href='all_category.php' </script>";
                    }
                }
                
            
                ?>
                <form method="post" role="form">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $name = $data[1] ?>" placeholder="" aria-describedby="helpId">
                    </div>
                    <label for="">Status</label>

                    <?php 
                    if($data[2] == 1)
                    {
                        echo ' <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status" value="1" checked>
                        <label class="form-check-label" for="status">
                            Public
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status" value="0" >
                        <label class="form-check-label" for="status">
                            Private
                        </label>
                    </div>';
                    }
                    elseif($data[2] == 0)
                    {
                        echo ' <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status" value="1">
                        <label class="form-check-label" for="status">
                            Public
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status" value="0" checked>
                        <label class="form-check-label" for="status">
                            Private
                        </label>
                    </div>';
                    }
                    
                    ?>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

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

    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../plugins/toastr/toastr.min.js"></script>
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
</body>

</html>