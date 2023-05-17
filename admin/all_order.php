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
                            <th>Status</th>
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
                                    echo "<td>" . $row['address'] . "</td>";
                                    echo "<td>" . $row['order_date'] . "</td>";
                                    if ($row['status'] == 0) {
                                        echo "<td><a href='all_order.php?action=process&id=" . $row['id'] . "'";
                                        
                                        echo " onclick='return confirm(\"Are you sure process order?\");' class='badge badge-danger'>Unprocessed </a></td>";
                                      } elseif ($row['status'] == 1) {
                                        echo "<td><span class='badge badge-success'>Processing </span>";
                                      }
                                    echo "<td class='text-right'>";
                                    echo "<a  id='".$row['id']. "'  class='show-detail btn btn-sm btn-success '>
                         <span style='color:#fff;'> Show Detail </span>
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
                            if(isset($_GET['action'])== 'process') {
                                $id = $_GET['id'];
                                $sql = "UPDATE orders SET status = 1 WHERE id = " . $id . "";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    echo "<script>alert('Order Processed Successfully')</script>";
                                    echo "<script>window.location.href='all_order.php'</script>";
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
        <div class="modal fade"  id="modal-order" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header float-right">
                        <h5>Order details</h5>
                        <div class="text-right">
                            <i data-dismiss="modal" aria-label="Close" class="fa fa-close"></i>
                        </div>
                    </div>
                    <div class="modal-body" id="order-body">
                    <?php @include("order_detail.php");?>

                    </div>
                    <div class="modal-footer">
                        <button id="close-modal" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    <script src="../plugins/datatables/jquery.dataTables.js"></script>
    <script src="../plugins/datatables-fixedcolumns/js/dataTables.fixedColumns.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.4/js/dataTables.fixedColumns.min.js"></script>
    

    <script>
        $(document).ready(function() {
            $("#table-order").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
        // $(document).ready(function(){
        //     $(document).on('click','.show-detail',function(){
        //         var ids = $(this).attr('id');
        //         $.ajax({
        //             url: "order_detail.php",
        //             type: "post",
        //             data: {
        //                 ids:ids
        //             },
        //             success: function(data) {
        //                 $('#modal-body').html(data);
        //                 $('#modal-order').modal('show');
        //             }
        //         });
        //     });
        // })
        $("#close-modal").click(function(){
            $('#modal-order').modal('hide');
        });
        $(document).ready(function(){
			$(document).on('click','.show-detail',function(){
				var ids =$(this).attr('id');
				$.ajax({
                    url: "order_detail.php",
					type:"post",
                    data: {
                        ids:ids
                    },
					success: function(data) {
                        $('#order-body').html(data);
                        $('#modal-order').modal('show');
                    }
				});
			});
		});

    </script>
</body>

</html>