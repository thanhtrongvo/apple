<?php
    include('database/connection.php');
    $syn = "SELECT * FROM `product` ";
    $result = mysqli_query($conn,$syn);
        $row = mysqli_fetch_array($result);
?>
    