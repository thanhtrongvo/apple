<?php
    header('Content-Type: application/json');
    require_once('../../database/connection.php');
    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

    if(isset($_POST['date'])) {
        $date = $_POST['date'];

    }
    else {
        $date = ""; 
        $subdate = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();

    }
    if($date == '1weed') {
        $subdate = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
    }
    else if($date = '28day') {
        $subdate = Carbon::now('Asia/Ho_Chi_Minh')->subDays(28)->toDateString();
    }
    else if($date = '3month') {
        $subdate = Carbon::now('Asia/Ho_Chi_Minh')->subMonths(3)->toDateString();
    }
    else if($date = '1year') {
        $subdate = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
    }
    $sql = "SELECT * FROM `Order` WHERE order_date BETWEEN '$subdate' AND '$now'";
    $result = mysqli_query($conn,$sql);

    while($val = mysqli_fetch_array($sql_query)) {
        $data[] = array(
            'date' => $val['order_date'],
            'order' => $val['id'],
            'quantity' => $val['quantity'],
            'price' => $val['total_price']
        );
    }
    echo json_encode($data);


?>