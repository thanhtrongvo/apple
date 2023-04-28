<?php 
    function add($table,$data) {
        global $conn;
        if(is_array($data)) {
            $field = "";
            $value = "";
            $i = 0;
            foreach($data as $key => $value) {
                if($key!='add') {
                    $i++;
                    if($i==1) {
                        $field .= $key;
                        $value .= "'" . $value . "'";
                    }
                    else {
                        $field .= ",". $key ;
                        $value .= ",'" . $value . "'";  
                    }
                }
               
            }

        }
        $sql = "INSERT INTO $table ($field) VALUES ($value)";
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }
    // function add($table,$data) {
    //     global $conn;
    //     if(is_array($data)) {
    //         $field = "";
    //         $value = "";
    //         $i = 0;
    //         foreach($data as $key => $value) {
    //             if($key!='add') {
    //                 $i++;
    //                 if($i==1) {
    //                     $field .= $key;
    //                     $value .= "'" . $value . "'";
    //                 }
    //                 else {
    //                     $field .= ",". $key ;
    //                     $value .= ",'" . $value . "'";  
    //                 }
    //             }
               
    //         }
    //     }
    //     $sql = "INSERT INTO $table ($field) VALUES ($value)";
    //     $sql .= " VALUE ($value)"; 
    //     mysqli_query($conn, $sql) or die(mysqli_error($conn));
    // }
    function delete($table,$id) {
        global $conn;
        $sql = "DELETE FROM $table WHERE id = $id";
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }
    function update($table,$data,$id) {
        global $conn;
        $field = "";
        $value = "";
        $i = 0;
        foreach($data as $key => $value) {
            if($key!='edit') {
                $i++;
                if($i==1) {
                    $field .= $key;
                    $value .= "'" . $value . "'";
                }
                else {
                    $field .= ",". $key ;
                    $value .= ",'" . $value . "'";  
                }
            }
           
        }
        $sql = "UPDATE $table SET $field = $value WHERE id = $id";
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }



?>