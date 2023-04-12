<?php
include_once('../database/connection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
              <h1>All Category</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../admin/index.php">Home</a></li>
                <li class="breadcrumb-item active">Category</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
      <form method="get"  > 
        <div class="form-group">
          <label for="search">Search by Name</label>
          <input name="search" type="text" class="form-control" id="search"  placeholder="">

        </div>
        <div class="form-group" >
        <button name="submit" type="submit" class="btn btn-primary">Search</button>   
      </div>
      </form>
        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Status</th>
              <th>Created at </th>
              <th class='text-right'>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
              $sql = "SELECT * FROM Category";
              $result = mysqli_query($conn, $sql);
              $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
              if (mysqli_num_rows($result) > 0) {
                foreach ($data as $row) {
                  echo "<td>" . $row['id'] . "</td>";
                  echo "<td>" . $row['name'] . "</td>";
                  if ($row['status'] == 0) {
                    echo "<td><span class='badge badge-danger'>Private </span></td>";
                  } elseif ($row['status'] == 1) {
                    echo "<td><span class='badge badge-success'>Public </span>";
                  }
                  echo "<td>" . date('Y-m-d', strtotime($row['created_at'])) . "</td>";
                  echo "<td class='text-right'>";
                  echo "<a href='edit_category.php?id=" . $row['id'] . "' class='btn btn-sm btn-success'>
                      <i class='fas fa-edit'></i>
                  </a> ";
                  echo "<a onclick='return confirm(\"Are you sure to delete this item?\");'  id='btn_destroy'  href='all_category.php?action=delete&id=" . $row['id'] . "' class='btn btn-sm btn-danger btn-destroy'>
                      <i class='fas fa-trash'></i>
                  </a>
              </td>


                  </tr>";
                }
              }

              if (isset($_GET['action']) == 'delete' && isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "DELETE FROM Category WHERE id = " . $_GET['id'] . "";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                  echo "<script>alert('Category Deleted Successfully')</script>";
                  echo "<script>window.location.href='all_category.php'</script>";
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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <script>



  </script>
</body>

</html>