<?php 
    include('database/connection.php');
    ob_start();
    session_start();

    if(isset($_POST['signin'])) {
        $email = $_POST['email1'];
        $pswd = $_POST['pswd1'];
        $sql = "SELECT * FROM `User` WHERE email = '$email' AND password = '$pswd'"; 
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);
            $role = $row['role_id'];
            if($role == 1) {
                $_SESSION['role'] = 1;
                $_SESSION['name'] = $row['fullname'];
                header('location:admin/index.php');
            }
            else {
                $_SESSION['role'] = $role;    
                $_SESSION['name'] = $row['fullname'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['phone'] = $row['phone_number'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['pswd'] = $row['password'];
                header('location:index.php');
                echo "<script> alert('Sign in successfully!') </script>";
            }
        }
        else {
            echo "<script> alert('Sign in failed!') </script>";
        }
       
    }
?>