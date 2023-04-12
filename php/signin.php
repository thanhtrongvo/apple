<?php 
    if(isset($_POST['signin'])) {
        $email = $_POST['email'];
        $pswd = $_POST['pswd'];
        $sql = "SELECT * FROM `User` WHERE email = '$email' AND password = '$pswd'"; 
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)) {
            $row = mysqli_fetch_row($result);
            $_SESSION['signin'] = $row;
            header('location:admin/index.php');
        }
        else {
            echo "<script> alert('Sign in failed!') </script>";
        
        }
       
    }
?>