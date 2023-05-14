<?php




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
                                    $namepro = $data['product_id'];
                                    $sqlsub ="SELECT * FROM product WHERE id = '.$namepro.'";
                                    $rs = mysqli_query($conn, $sqlsub);
                                    $data1 = mysqli_fetch_all($rs);
                                    
                                    foreach ($data as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $data1['title'] . "</td>"; 
                                        echo "</td>";
                                        echo "<td>" . $row['num']  . "</td>";
                                        echo "<td>" . $row['total_money'] . "</td>";
                                        echo "</tr>";
                                    }
                                   ?>
                                </tbody>
                            </table>
                        </div>

