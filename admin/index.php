<?php

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
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
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

        <div class="chart-container">
          <canvas id="chart-order"></canvas>

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

  <script>
    $(document).ready(function() {
      showChartOrder();
    });

    function showChartOrder() {
      $.post("data/order.php", function(data) {
        var lable = [];
        var result = [];
        for (var i in data) {
          lable.push(data[i].order_date);
          result.push(data[i].total_money);
        }
        var pie = $("#chart-order");
        var chartdata = new Chart(pie, {
          type: 'pie',
          data: {
            labels: lable,
            datasets: [{
              label: 'Money of Order',
              borderColor: ["rgba(217, 83, 79,1)", "rgba(240, 173, 78, 1)", "rgba(92, 184, 92, 1)"],
              backgroundColor: ["rgba(217, 83, 79,0.2)", "rgba(240, 173, 78, 0.2)", "rgba(92, 184, 92, 0.2)"],
            }],
          },
          option: {
            title: {
              display: true,
              text: 'Chart Order'
            }
          }
        });
      })
    }
    // $(document).ready(function() {
    //   $.ajax({
    //     url: 'chart.php',
    //     method: 'GET',
    //     success: function(data) {
    //       console.log(data);
    //       var month = [];
    //       var order = [];

    //       for (var i in data) {
    //         month.push(data[i].month);
    //         order.push(data[i].order);
    //       }

    //       var chartdata = {
    //         labels: month,
    //         datasets: [{
    //           label: 'Number of Order',
    //           backgroundColor: '#49e2ff',
    //           borderColor: '#46d5f1',
    //           hoverBackgroundColor: '#CCCCCC',
    //           hoverBorderColor: '#666666',
    //           data: order
    //         }]
    //       };

    //       var ctx = $("#chart-order");

    //       var barGraph = new Chart(ctx, {
    //         type: 'bar',
    //         data: chartdata
    //       });
    //     },
    //     error: function(data) {
    //       console.log(data);
    //     }
    //   });
    // });
  </script>
  <script src="../plugins/chart.js/Chart.js"></script>
  <script src="../plugins/jquery/jquery.js"></script>


</body>

</html>