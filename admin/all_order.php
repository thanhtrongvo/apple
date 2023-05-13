<?php
include_once('../database/connection.php');

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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>

    </style>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <?php
            include('../admin/left_menu.php');
            ?>
        </aside>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>All Product</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../admin/index.php">Home</a></li>
                                <li class="breadcrumb-item active">Product</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- <form method="get"  > 
        <div class="form-group">
          <label for="search">Search by Name</label>
          <input name="search" type="text" class="form-control" id="search"  placeholder="">

        </div>
        <div class="form-group" >
        <button name="submit" type="submit" class="btn btn-primary">Search</button>   
      </div>
      </form> -->
                <table id="table-order">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Order Date</th>
                            <th>Note</th>
                            <th class='text-right'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            // $records_per_page = 4;
                            // $sql = "SELECT * FROM Product";
                            // $result = mysqli_query($conn, $sql);
                            // $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            // $total_records = mysqli_num_rows($result);
                            // $total_pages = ceil($total_records / $records_per_page);
                            // $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            // $start = ($page - 1) * $records_per_page;
                            // $sql = "SELECT * FROM Product LIMIT $start, $records_per_page";
                            $sql = "SELECT * FROM orders";
                            $result = mysqli_query($conn, $sql);
                            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            if (mysqli_num_rows($result) > 0) {
                                foreach ($data as $row) {
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['fullname'] . "</td>";
                                    echo "<td>" . $row['email']  . "</td>";
                                    echo "<td>" . $row['phone_number'] . "</td>";
                                    echo "<td>" . $row['Address'] . "</td>";
                                    echo "<td>" . $row['order_date'] . "</td>";
                                    echo "<td>" . $row['note'] . "</td>";
                                    echo "<td class='text-right'>";
                                    echo "<a data-target='#modal-order' href='all_order.php?order=".$row['id']."'  class='btn btn-sm btn-success btn-destroy'>
                         <span style='color:#fff;'> Xem Chi Tiết </span>
                      </a>
                  </td>
    
    
                      </tr>";
                                }
                            }
                            if (isset($_GET['action']) == 'delete' && isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $sql = "DELETE FROM Product WHERE id = " . $_GET['id'] . "";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    echo "<script>alert('Product Deleted Successfully')</script>";
                                    echo "<script>window.location.href='all_product.php'</script>";
                                }
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </section>
            <!-- /.content -->
        </div>

        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <?php
            include('../admin/footer.php');
            ?>
        </footer>

        <!-- Modal order detail -->
        <div class="modal fade" id="modal-order" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?php 
                // $sql = "SELECT * FROM order_detail";
                // $result = mysqli_query($conn, $sql);
                // $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                // $sqlsub = "SELECT * FROM order_detail WHERE order_id = ";
                            
            
            
            ?>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header float-right">
                        <h5>User details</h5>
                        <div class="text-right">
                            <i data-dismiss="modal" aria-label="Close" class="fa fa-close"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Order</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Samso</td>
                                        <td>Natto</td>
                                        <td>@samso</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Tinor</td>
                                        <td>Horton</td>
                                        <td>@tinor_har</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Mythor</td>
                                        <td>Bully</td>
                                        <td>@myth_tobo</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../plugins/datatables/jquery.dataTables.js"></script>
    <script src="../plugins/datatables-fixedcolumns/js/dataTables.fixedColumns.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#table-order").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
</body>

</html>