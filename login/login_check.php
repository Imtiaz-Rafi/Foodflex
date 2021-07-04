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



?>