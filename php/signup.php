<?php
include ('database/connection.php');
if(isset($_POST['signup'])){
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $pswd = $_POST['pswd'];
  $sql = "INSERT INTO `User`(`fullname`, `phone_number`, `email`, `password`) VALUES ('$name','$phone','$email','$pswd')";
  $result = mysqli_query($conn,$sql);
  if($result){
    echo " <script> alert('Sign up success!')</script>";
    header('location:index.php');
  }else{
    echo "<script> alert('Sign up failed !') </script>";
  }
}




?>