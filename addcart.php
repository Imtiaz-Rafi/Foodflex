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

        $query = "SELECT * FROM order_cart";
        $cart_res = $con->query($query);
        while($cart_row = $cart_res->fetch_assoc()){
            if($cart_row['Name'] === $prod_name){
                $cart_id = $cart_row['ID'];
                $qty = $cart_row['Qty']+1;
                break;
            }
        }
        $total_price = $qty*$price;
        if($qty==1){
            $cart_sql = "INSERT INTO order_cart(Name,Price,Qty,Total_price,Prod_id) VALUES('$prod_name','$price','$qty','$total_price','$productid')";
        }else{
            $cart_sql = "UPDATE order_cart SET Qty='$qty',Total_price='$total_price' Where ID='$cart_id';";
        }
        
        $cart_result = $con->query($cart_sql);
        if($cart_result){
            header("location: menu.php");
        }else{
            echo "WA";
        }
        
    }

?>