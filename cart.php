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
    <link rel="stylesheet" href="css/cart.css">
    <title>Cart</title>
</head>
<body>
    <!-- HEADER -->
    <?php include 'header.php';?>
    <section class="bg-row text-center">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#">Cart</a></li>
                <!-- <li class="nav-item"><a href="#">Info</a></li> -->
            </ul>
        </div>
    </section>
    <section class="grey-bg">
        <div class="container">
            <div class="container-full">
                <div class="cart-main">
                    <table class="table">
                        <thead>
                            <tr>
                                <td colspan="3" class="text-left sans back-to-menue">
                                    <a href="menu.php"><i class="fas fa-arrow-left"></i>Back to Menue</a>
                                </td>
                            </tr>
                        </thead>
                        <thead class="grey">
                            <tr>
                                <th>Description</th>
                                <th class="text-right">Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql="SELECT * FROM order_cart";
                                $result = $con->query($sql);
                                while($row = $result->fetch_assoc()){
                            ?>
                            <tr>
                                <td>
                                    <h4><?= $row['Name'];?></h4>
                                    <a href="cart/removecart.php?productid=<?php echo $row['ID'];?>&&id=2" class="remove sans">Remove</a>
                                    </td>
                                <td>
                                    <div class="add">
                                        <a href="cart/inccart.php?productid=<?php echo $row['ID'];?>">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                        <input type="input" value="<?=$row['Qty']?>">
                                        <a href="cart/deccart.php?productid=<?php echo $row['ID'];?>">
                                            <i class="fas fa-minus"></i>
                                        </a>
                                    </div>
                                </td>
                                <td class="sans"><?= $row['Total_price'];?></td>
                            </tr>
                            <?php }?>
                            
                            <tr class="grey">
                                <td colspan="2" class="text-right sans">Subtotal</td>
                                <td class="sans">
                                    <?php 
                                        $sql = "SELECT * FROM order_cart";
                                        $result = $con->query($sql);
                                        $sub_total=0;
                                        while($row = $result->fetch_assoc()){
                                            $sub_total = $sub_total + $row['Total_price'];
                                        }
                                        echo $sub_total;
                                    ?>
                                     Taka</td>
                            </tr>
                            <tr class="grey">
                                <td colspan="2" class="text-right sans">Delivery Charge</td>
                                <td class="sans">100 Taka</td>
                            </tr>
                            <tr class="grey">
                                <td colspan="2" class="text-right sans">Total Amount</td>
                                <td class="sans"><?php echo $sub_total+100;?> Taka</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="chkout grey text-right upper">
                        <?php if($data){ ?>
                            <a href="#checkout">Check Out
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        <?php }else{?>
                            <a href="login/signin.php?value=2">Check Out
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FOOTER -->
    <?php include 'footer.php';?>
</body>
</html>