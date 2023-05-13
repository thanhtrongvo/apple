<?php
    header('Content-Type: application/json');
    require_once('../../database/connection.php');
    $data = array();
    $sql = "SELECT total_money FROM Order_Details";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    mysqli_close($conn);
    echo json_encode($data);
    




?>