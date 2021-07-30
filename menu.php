<?php
    session_start();
    include 'Connection.php';
    include 'login/login_check.php';
    $data = is_logged($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php';?>
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
                <!-- MENU LIST -->
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
                <!-- FOOD LIST -->
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
                                            $Cat_name = $cat_row['Cat_name'];
                                            $sql="SELECT * FROM food_list WHERE Cat_name='$Cat_name'";
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
                                                            <a 
                                                            <?php if($data){?> 
                                                                href="cart/addcart.php?productid=<?php echo $row['ID'];?>"
                                                            <?php }else{ ?>
                                                                href="menu.php?logged=0"
                                                            <?php }?>>
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
                <!-- MINI CART -->
                <div class="col-3">
                    <!-- MINI CART HEADER -->
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
                                        <th class="text-right">Qty</th>
                                        <th class="text-center">Price</th>
                                        <!-- <th><div class="blank"></div> </th> -->
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- MINI CART ELEMENT -->
                    <div class="cart-middle">
                        <table class="table" id="mini-cart">
                            <tbody>
                                <?php 
                                    $sql="SELECT * FROM order_cart";
                                    $result = $con->query($sql);
                                    $row = $result->num_rows;
                                    if($row == 0){
                                        if(isset($_REQUEST['item']) && $_REQUEST['item']==0){?>
                                        <div class="warning">Please Add some food for CHECKOUT</div>
                                    <?php }else if(isset($_REQUEST['logged']) && $_REQUEST['logged']==0){?>
                                        <div class="warning">Log In First to ADD Item.</div>
                                    <?php }}
                                    while($row = $result->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?= $row['Name'];?></td>
                                    <td>
                                        <div class="add">
                                            <a href="cart/inccart.php?productid=<?php echo $row['ID'];?>&&id=1">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                            <input type="input" value="<?= $row['Qty']?>">
                                            <a href="cart/deccart.php?productid=<?php echo $row['ID'];?>&&id=1">
                                                <i class="fas fa-minus"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        ৳<?= $row['Total_price'];?>
                                        <a href="cart/removecart.php?productid=<?php echo $row['ID'];?>&&id=1">
                                            <i class="fas fa-minus-circle"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!--SUB TOTAL-->
                    <div class="cart-footer">
                        <table class="table">
                            <tbody>
                                <tr class="green-cart">
                                    <td>Sub Total</td>
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
                    <!-- CHECKOUT -->
                    <div class="checkout">
                        
                            <?php 
                                $sql="SELECT * FROM order_cart";
                                $result = $con->query($sql);
                                $result->fetch_assoc();
                                $row = $result->num_rows;
                                ?>
                                    <a <?php if($row==0){ ?>
                                        href="menu.php?item=0"
                                    <?php }else if(!$data){ ?>
                                        href="menu.php?logged=0";
                                    <?php }else{ ?>
                                        href="cart.php"
                                    <?php ;}?> >
                                        <button class="btn btn-primary loader">Checkout</button>
                                    </a>
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>
    <!-- FOOTER -->
    <!-- <?php // include 'footer.php'?> -->
</body>
</html>