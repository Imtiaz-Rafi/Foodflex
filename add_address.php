<?php 
    session_start();
    include 'Connection.php';
    include 'login/login_check.php';
    $data = is_logged($con);
?>

<?php 
    $address = "";
    $address = $_REQUEST["address"];
    $ID = $data['ID'];
    $sql = "UPDATE customers SET Address='$address' WHERE ID='$ID'";
    $result = $con->query($sql);
    if($result){
        //echo $ID;
        header('location: checkout.php');
    }else{
        echo $address;
        echo 'WA';
    }

?>
