<?php
    function nameProduct($id) {
        include('../database/connection.php');
        $sql = "SELECT title FROM product WHERE id = '.$id.'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;

    }



?>
                        <div>
                            <table border="1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total Money</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
                                   include('../database/connection.php');
                                    $id = $_POST['ids'];
                                    $sql = "SELECT * FROM order_details WHERE order_id = '.$id.'";
                                    $result = mysqli_query($conn, $sql);
                                    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    foreach ($data as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";  
                                        $sql1 = "SELECT * FROM product WHERE id = '".$row['product_id']."'";
                                        $result1 = mysqli_query($conn, $sql1);
                                        $data1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
                                        foreach ($data1 as $row1) {
                                            echo "<td>" . $row1['title'] . "</td>";  
                                        }
                                        echo "<td>" . $row['num']  . "</td>";
                                        echo "<td>" . number_format($row['total_money']) . "đ</td>";
                                        echo "</tr>";
                                    }
                                   ?>
                                </tbody>
                            </table>
                        </div>

