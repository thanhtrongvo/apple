<?php
include('database/connection.php');
$nameErr = $phoneErr = $emailErr = $passwordErr = $roleErr = "";
if (isset($_POST['signup'])) {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $pswd = $_POST['pswd'];
    $sql = "INSERT INTO `User` (fullname,phone_number, email, password) VALUES ('$name','$phone','$email','$pswd')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      
      header('location:index.php');
      echo " <script> alert('Sign up success!') </script>";
      exit;
    } else {
      echo "<script> alert('Sign up failed !') </script>";
    }
  }

