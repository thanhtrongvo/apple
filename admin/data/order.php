<?php
    header('Content-Type: application/json');
    require_once('../../database/connection.php');
    if(isset($_POST['date'])) {
        $date = $_POST['date'];
    }




?>