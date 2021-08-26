<?php include "header.php";?>
<head>
    <title>Menue</title>
</head>
<body>
    <!-- BODY -->
    <section class="bg-row text-center">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#">Menu</a></li>
                <!-- <li class="nav-item"><a href="#">Info</a></li> -->
            </ul>
        </div>
    </section>
    <section class="grey-bg-menu">
        <?php
        $sql="SELECT * FROM order_cart";
        $result = $con->query($sql);
        $row = $result->num_rows;
        if($row == 0){
            if(isset($_REQUEST['item']) && $_REQUEST['item']==0){?>
            <div class="warning">Please Add some food for CHECKOUT</div>
        <?php }else if(isset($_REQUEST['logged']) && $_REQUEST['logged']==0){?>
            <div class="warning">Log In First to ADD Item.</div>
        <?php }} ?>
        <div class="container">
            <div class="contain-flex">
                <!-- MENU LIST -->
                <div class="col-1">
                    <div class="pos-fix21">
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
                                <a id="<?= $cat_row['Cat_name']?>" class="top-menu-space"></a>
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
                    <div class="pos-fix">
                        <table class="cart">
                            <thead class="cart-top-head">
                                <tr>
                                    <td class="text-left"><h3>Your Cart </h3></td>
                                    <td></td>
                                    <td>
                                        <span class="item">
                                            <i class="fas fa-cart-plus"></i>
                                            <?php 
                                                $sql="SELECT * FROM order_cart";
                                                $result = $con->query($sql);
                                                $result->fetch_assoc();
                                                echo $row = $result->num_rows;
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                            </thead>
                            <thead class="cart-top">
                                <tr>
                                    <th class="text-left">Item</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Price</th>
                                </tr>
                            </thead>
                            <tbody class="cart-body">
                                <?php 
                                    $sql="SELECT * FROM order_cart";
                                    $result = $con->query($sql);
                                    $row = $result->num_rows;
                                    while($row = $result->fetch_assoc()){
                                    ?>
                                    <tr class="bottom-rgb">
                                        <td class="text-left"><?= $row['Name'];?></td>
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
                            <tbody>
                                <tr class="green-cart">
                                    <td class="text-left">Sub Total</td>
                                    <td></td>
                                    <td class="text-right">৳ <?php 
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
                        <div class="cart-bottom">
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
                                    <button class="btn btn-primary loader">
                                        Checkout
                                    </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FOOTER -->
    <!-- <?php // include 'footer.php'?> -->
</body>
</html>