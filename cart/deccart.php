<?php include '../Connection.php'; ?>
<?php
    if(isset($_GET['productid'])){
        $productid = $_GET['productid'];
        $sql = "SELECT * FROM order_cart WHERE ID=$productid";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        $qty = $row['Qty'];
        $qty = $qty-1;
        $price = $row['Price'];
        $total_price = $qty*$price;

        if($qty==0){
            $cart_sql = "DELETE FROM order_cart WHERE ID='$productid';";
        }else{
            $cart_sql = "UPDATE order_cart SET Qty='$qty',Total_price='$total_price' Where ID='$productid';";
        }
        $cart_result = $con->query($cart_sql);
        if($cart_result){
            if(isset($_GET['id']) && $_GET['id']==2){
                header("location: ../cart.php");
            }else if(isset($_GET['id']) && $_GET['id']==1){
                header("location: ../menu.php");
            }else{
                header("location: ../menu.php?id=0");
            }
        }else{
            echo "WA";
        }
        
    }

?>