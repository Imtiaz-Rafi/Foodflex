<?php
    session_start();
    include 'Connection.php';
    include 'login/login_check.php';
    $admin_data = admin_logged($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php';?>
    <link rel="stylesheet" href="css/style.css">
    <title>All Order</title>
</head>
<body>
    <!-- HEADER -->
    <section class="header">
        <div class="container">
            <div class="logo">
                <a href="admin.php"><img src="images/logo.png" alt="Logo"></a>
            </div>
            <div class="nav-area">
                <?php
                    if($admin_data){ $Name = $admin_data['Username']; ?>
                    <ul>
                        <li class="logout">
                            <a href="login/logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                Log Out
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="far fa-user"></i>
                                <?php echo "Hi! ADMIN"?>
                            </a>
                        </li>
                    </ul>

                <?php }else{ ?>
                    <ul>
                        <?php header('location: admin/admin_login.php');?>
                    </ul>
                <?php }?>
            </div>
        </div>
    </section>
    
    <!-- BODY -->
    <section class="bg-row text-center">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#">Order List</a></li>
            </ul>
        </div>
    </section>
    <section class="grey-bg padding60">
        <div class="container">
            <div class="container-full">
                <div class="back-to">
                    <a href="admin.php"><i class="fas fa-arrow-left"></i> Back to Admin Home</a>
                </div>
                    <table>
                        <thead class="order-table-head">
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Customer Mobile</th>
                                <th>Location</th>
                                <th>Amount</th>
                                <th>Delivery Type/Time</th>
                                <th>Time</th>
                                <th>Status Order</th>
                                <th>Details</th>
                                
                            </tr>
                        </thead>
                        <tbody class="order-table-body">
                            <?php
                                $sql = "SELECT * FROM final_order ORDER BY ID DESC";
                                $result = $con->query($sql);
                                if($result->num_rows>0){
                                    while($row = $result->fetch_assoc()){ ?>
                                        <tr>
                                            <td><?= $row['ID']; ?></td>
                                            <td><?= $row['Cust_name']; ?></td>
                                            <td><?= $row['Cust_mobile']; ?></td>
                                            <td><?= $row['Cust_address']; ?></td>
                                            <td>৳<?= $row['Order_total']; ?></td>
                                            <td><?= $row['Del_type']; ?>/<?= $row['Del_time']; ?></td>
                                            <td><?= $row['Order_time']; ?></td>
                                            <td><?php
                                                if($row['Status']=='Accepted'){?>
                                                    <div class="green-back color-white">
                                                        <?=$row['Status']; ?>
                                                    </div>
                                                <?php }else if($row['Status']=='Rejected'){ ?>
                                                    <div class="red-back color-white">
                                                        <?=$row['Status']; ?>   
                                                    </div>
                                                <?php }else{ ?>
                                                    <div class="orange-back color-white">
                                                        <?=$row['Status']; ?>
                                                    </div>
                                                <?php }?>
                                            </td>
                                            <td>
                                                <button class="crud" style="float:none">
                                                    <a href="admin_order_details.php?row=<?=$row['ID']; ?>">
                                                        <i class="fas fa-angle-double-right green"></i>
                                                    </a>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php }else{ ?>

                               <?php }
                            ?>
                            
                        </tbody>
                    </table>
            </div>
        </div>
    </section>
    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            
            <p>&copy; Copyright Foodflex.com 2021 | All rights reserved.</p>
            
        </div>
    </footer>
</body>
</html>