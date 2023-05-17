<?php
include('../database/connection.php');
ob_start();
session_start();
if (!($_SESSION['role'])) {
  header('location:../index.php');
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
  <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap-grid.css">
  <link rel="stylesheet" href="../plugins/morris.js-0.5.1/morris.css">



  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/canvasjs-3.7.5/canvasjs.angular.component.ts">
  <script src="../plugins/daterangepicker/daterangepicker.css"></script>
  <style>
    .chart-container {
      position: relative;
      margin: auto;
      height: 80vh;
      width: 80vw;
    }

    .chart-order {
      position: relative;
      margin: auto;
      height: 80vh;
      width: 80vw;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper bg-light">
    <!-- Navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <?php include('left_menu.php');  ?>
    </aside>


    <div class="content-wrapper">

      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"> <a href="../admin/index.php">Home</a> </li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="jumbotron">
          <h1 class="display-4">Welcom to Dashboard! </h1>
          <p class="lead">This web is application for manage all product Apple</p>
          <hr class="my-4">
          <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
          </p>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title text-center ">Product</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>

          </div>
          <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Orders</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">User</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>

        </div>
        <div class="row">
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
              <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="chart-container">
                <div class="select-date">
                  <select> 
                    <option value="1weed">One Weed</option>
                    <option value="28day">28 Day</option>
                    <option value="3month">3 Month</option>
                    <option value="1year">1 Year</option>
                  </select>
                </div>
                
              </div>

            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <div class="chart-container">
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Quantity</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td scope="row"></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td scope="row"></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>

          </div>

        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <?php
    include('../admin/footer.php');

    ?>
  </footer>


  </div>

  <script src="../plugins/jquery/jquery.js"></script>
  <script src="../plugins/jquery/jquery.min.js"></script>
  <script src="../plugins/chart.js/Chart.js"></script>
  <script src="../plugins/morris.js-0.5.1/morris.js"></script>
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../dist/js/adminlte.min.js"></script>
  <script src="../dist/js/demo.js"></script>

  <script>
  $(document).ready(function() {

      var char = new Morris.Area({  
        element: 'chart-container',
        xkey: 'date',
        ykeys: ['date', 'order', 'quantity', 'price'],
        labels: ['Date','Order', 'Quantity', 'Price',],
      

      });


  $('.select-date').change(function(){
    statis();
    var date = $(this).val();
    if(date == '1weed'){
      var text = 'One Weed';
    } else if(date == '28day'){
      var text = '28 Day';
    } else if(date == '3month'){
      var text = '3 Month';
    } else if(date == '1year'){
      var text = '1 Year';
    }
    $.ajax({
      url: 'data/order.php',
      type: 'post',
      dataType:'json',
      data: {date: date},
      success: function(data){
        char.setData(data);
      }
    })
  })
  function statis() {
    var text = "1 Year ";
    $('.text-date').text(text);
    $.ajax({
      url: 'data/order.php',
      type: 'post',
      dataType:'json',
      data: {date:date},
      success: function(data){
        char.setData(data);
      }
    })
  }
});

  </script>


</body>

</html>