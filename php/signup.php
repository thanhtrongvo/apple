<?php
include('database/connection.php');
$nameErr = $phoneErr = $emailErr = $passwordErr = $roleErr = "";
if (isset($_POST['signup'])) {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $pswd = $_POST['pswd'];
  if (empty($name)) {
    $nameErr = "Name is required";
  }
  if (empty($phone)) {
    $phoneErr = "Phone is required";
  }
  if (empty($email)) {
    $emailErr = "Email is required";
  }
  if (empty($pswd)) {
    $passwordErr = "Password is required";
  }
  if (is_numeric($name)) {
    $nameErr = "Name must be string";
  }
  if (!is_numeric($phone)) {
    $phoneErr = "Phone must be number";
  }
  if (!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone)) {
    $phoneErr = "Phone is invalid";
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Email is invalid";
  }
  if (strlen($pswd) < 6) {
    $passwordErr = "Password must be at least 6 characters";
  }
  if (empty($nameErr) && empty($phoneErr) && empty($emailErr) && empty($passwordErr) && empty($roleErr)) {
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
}
