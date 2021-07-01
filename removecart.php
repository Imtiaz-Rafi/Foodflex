<?php include 'Connection.php'; ?>
<?php
    if(isset($_GET['productid'])){
        $productid = $_GET['productid'];
        $sql = "SELECT * FROM order_cart WHERE ID=$productid";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        $cart_sql = "DELETE FROM order_cart WHERE ID='$productid';";
        $cart_result = $con->query($cart_sql);
        if($cart_result){
            header("location: menu.php");
        }else{
            echo "WA";
        }
        
    }

?>