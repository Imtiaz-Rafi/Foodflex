<?php
    function is_logged($con){
        if(isset($_SESSION['ID'])){
            $ID = $_SESSION['ID'];
            $sql = "SELECT * FROM customers WHERE ID='$ID'";
            $result = $con->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data = $row;
                    return $data;
                }
            }
        }
        //header('location: index.php');
        return;
    }
    function admin_logged($con){
        if(isset($_SESSION['admin_id'])){
            $ID = $_SESSION['admin_id'];
            $sql = "SELECT * FROM admin WHERE ID='$ID'";
            $result = $con->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $admin_data = $row;
                    return $admin_data;
                }
            }
        }
        //header('location: index.php');
        return;
    }


?>