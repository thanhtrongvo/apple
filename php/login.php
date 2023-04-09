<?php  
    include_once('../database/connection.php');
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $sql = "SELECT * FROM category WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if (mysqli_num_rows($result) > 0) {
      foreach ($data as $row) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['created_at'] = $row['created_at'];
        $_SESSION['updated_at'] = $row['updated_at'];
    }
    echo "<script>window.location.href='../admin/all_category.php'</script>";

    } else {
      echo "<script>window.location.href='../admin/login.php'</script>";
        
    }


?>