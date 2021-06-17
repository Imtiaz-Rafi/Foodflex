<?php
    $servername = "localhost";
    $username = "Foodflex";
    $password = "1234pciu";
    $dbname = "foodflex";
    
    // --Create Connection--
    $con = new mysqli($servername,$username,$password,$dbname);
    // Check connection
    if($con->connect_error){
        die("Connection Failed".$con->connect_error);
    }
    

?>