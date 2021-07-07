<?php
    session_start();
    include 'Connection.php';
    include 'login/login_check.php';
    $data = is_logged($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php';?>
    <link rel="stylesheet" href="css/style.css">
    <title>Menue</title>
</head>
<body>
    <!-- HEADER -->
    <?php include 'header.php'?>

    <!-- BODY -->
    <section class="bg-row text-center">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#">Menu</a></li>
                <!-- <li class="nav-item"><a href="#">Info</a></li> -->
            </ul>
        </div>
    </section>
    <section class="grey-bg">
        <div class="container">
            <div class="contain-flex">
                <div class="col-1">
                    <div class="sidebar">
                        <h3 class="upper">Menu Items</h3>
                        <ul>
                            <?php 
                                $sql = "SELECT * FROM category";
                                $result = $con->query($sql);
                                if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        ?>
                                        <li>
                                            <i class="fas fa-chevron-left"></i>
                                            <a href="#<?= $row['Cat_name'];?>"><?= $row['Cat_name'];?></a>
                                        </li>
                            <?php }} ?>
                        </ul>
                    </div>
                </div>

                <div class="col-2">
                    <div class="item-mid">
                        <?php
                            $cat_sql = "SELECT * FROM category";
                            $cat_result = $con->query($cat_sql);
                            if($cat_result->num_rows > 0){
                                while($cat_row = $cat_result->fetch_assoc()){
                                        $rid_link = $cat_row['Cat_name'];
                                    ?>
                                <div id="<?= $cat_row['Cat_name'];?>">
                                    <h3> <?= $cat_row['Cat_name'];?> </h3>
                                    <ul>
                                        <?php
                                            $cat_id = $cat_row['ID'];
                                            $sql="SELECT * FROM food_list WHERE cat_id=$cat_id";
                                            $result = $con->query($sql);
                                            if($result->num_rows>0){
                                                while($row = $result->fetch_assoc()){
                                                    ?>
                                            <li>
                                                <img src="images/<?= $row["Image"];?>" alt="burger">
                                                <div class="beside-img">
                                                    <h4><?= $row["FoodName"];?></h4> <!-- auto echo -->
                                                    <div class="d-tab w100">
                                                        <span class="price"><?= $row["Price"];?> Taka</span>
                                                        <button class="add-item">
                                                            
                                                            <a href="cart/addcart.php?productid=<?php echo $row['ID'];?>">
                                                                <i class="fa fa-plus"></i>
                                                                Add
                                                            </a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php }} ?>
                                    </ul>
                                </div>
                        <?php }} ?>
                    </div>
                </div>
                
                <div class="col-3">
                    <div class="cart-top">
                        <h3>Your Cart 
                            <span class="item">
                                <i class="fas fa-cart-plus"></i>
                                <?php 
                                    $sql="SELECT * FROM order_cart";
                                    $result = $con->query($sql);
                                    $result->fetch_assoc();
                                    echo $row = $result->num_rows;
                                ?>
                            </span>
                        </h3>
                        <div class="cart-body">
                            <table class="table" id="mini-cart">
                                <thead>
                                    <tr>
                                        <th class="text-center">Item</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Price</th>
                                        <!-- <th><div class="blank"></div> </th> -->
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="cart-middle">
                        <table class="table" id="mini-cart">
                            <tbody>
                                <?php 
                                    $sql="SELECT * FROM order_cart";
                                    $result = $con->query($sql);
                                    while($row = $result->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?= $row['Name'];?></td>
                                    <td>
                                        <div class="add">
                                            <a href="cart/inccart.php?productid=<?php echo $row['ID'];?>">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                            <input type="input" value="<?= $row['Qty']?>">
                                            <a href="cart/deccart.php?productid=<?php echo $row['ID'];?>">
                                                <i class="fas fa-minus"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-right">৳<?= $row['Total_price'];?></td>
                                    <td>
                                        <a href="cart/removecart.php?productid=<?php echo $row['ID'];?>">
                                            <i class="fas fa-minus-circle"></i>
                                        </a>
                                    </td>
                                </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-footer">
                        <table class="table">
                            <tbody>
                                <!-- <tr>
                                    <td>Subtotal</td>
                                    <td>0.0 Taka</td>
                                </tr> -->
                                <!-- <tr>
                                    <td>VAT(%)</td>
                                    <td>0.0 Taka</td>
                                </tr> -->
                                <tr class="green-cart">
                                    <td>Total Amount</td>
                                    <td>৳ <?php 
                                        $sql = "SELECT * FROM order_cart";
                                        $result = $con->query($sql);
                                        $total_price=0;
                                        while($row = $result->fetch_assoc()){
                                            $total_price = $total_price + $row['Total_price'];
                                        }
                                        echo $total_price;
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>  
                    </div>
                    <div class="checkout">
                        <a href="checkout.php">
                            <button class="btn btn-primary loader">Checkout</button>
                        </a>
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>
    <!-- FOOTER -->
    <?php include 'footer.php'?>
</body>
</html>