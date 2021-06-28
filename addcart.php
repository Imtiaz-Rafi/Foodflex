<?php include 'Connection.php'; ?>
<?php
    if(isset($_GET['productid'])){
        $productid = $_GET['productid'];
        $sql = "SELECT * FROM food_list WHERE ID=$productid";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        $prod_name = $row['FoodName'];
        $price = $row['Price'];
        $qty = 1;
        $total_price = $qty*$price;

        $cart_sql = "INSERT INTO order_cart(Name,Price,Qty,Total_price,Prod_id) VALUES('$prod_name','$price','$qty','$total_price','$productid')";
        $cart_result = $con->query($cart_sql);
        if($cart_result){
            header("location: menu.php");
        }else{
            echo "WA";
        }
        
    }

?>