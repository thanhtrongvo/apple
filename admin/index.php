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

        <div class="chart-container">
          <canvas id="myChart"></canvas>
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
  <script src="../plugins/canvasjs-3.7.5/canvasjs.min.js"></script>
  <script src="../plugins/canvasjs-3.7.5/jquery.canvasjs.min.js"></script>
  <script src="../plugins/chart.js/Chart.js"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <script src="../plugins/moment/moment.min.js"></script>

  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="../dist/js/adminlte.min.js"></script>
  <script src="../dist/js/demo.js"></script>

  <script>  
  var ctx  =  document.getElementById("myChart").getContext("2d");
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["iPhone", "iPad", "Macbook", "iMac", "Apple Watch", "AirPods"],
      datasets: [{
        label: 'Total Product',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)', 
          'rgba(255, 206, 86, 0.2)', 
          'rgba(75, 192, 192, 0.2)', 
          'rgba(153, 102, 255, 0.2)', 
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)', 
          'rgba(54, 162, 235, 1)', 
          'rgba(255, 206, 86, 1)', 
          'rgba(75, 192, 192, 1)', 
          'rgba(153, 102, 255, 1)', 
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  </script>


</body>

</html>