<?php include 'header.php'; ?>
<head>
    <title>All Order</title>
</head>
<body>
    <?php
        $ID = $_REQUEST['row'];
        if(isset($_REQUEST['id']) && $_REQUEST['id']==3){
            $sql = "DELETE FROM final_order WHERE ID='$ID'";
            $result = $con->query($sql);
            header('location: admin_order.php');
        }
        else if(isset($_REQUEST['id']) && $_REQUEST['id']==2){
            $sql = "UPDATE final_order SET Status='Rejected' WHERE ID='$ID'";
            $result = $con->query($sql);
            //header('location: admin_order_details.php');
        }
        else if(isset($_REQUEST['status']) && $_REQUEST['status']==1){
            $sql = "UPDATE final_order SET Status='Accepted' WHERE ID='$ID'";
            $result = $con->query($sql);
            //header('location: admin_order_details.php');
        }
    ?>

    <!-- BODY -->
    <section class="bg-row text-center">
        <div class="container">
            <ul>
                <li class="nav-item"><a href="#">Order List</a></li>
            </ul>
        </div>
    </section>
    <section class="grey-bg padding60">
        <div class="container">
            <div class="container-full">
                <div class="back-to">
                    <a href="admin_order.php"><i class="fas fa-arrow-left"></i> Back to Order List</a>
                </div>
                <?php
                    $ID = $_REQUEST['row'];
                    $sql = "SELECT * FROM final_order WHERE ID='$ID'";
                    $result = $con->query($sql);
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                            if(isset($_REQUEST['status']) && $_REQUEST['status']==3){ ?>
                                <div class="order-status">
                                    <form action="admin_order_details.php?id=3&&row=<?=$row['ID']; ?>" method="post">
                                        <span class="admin-form-control">ARE YOU SURE TO DELETE THIS ORDER?</span><br>
                                        <input type="submit" value="OK ✔" class="btn confirm ok">
                                        <a href="admin_order_details.php?row=<?=$ID ?>" class="confirm no">NO ✖</a>
                                    </form>
                                </div>
                            <?php }else if(isset($_REQUEST['status']) && $_REQUEST['status']==2){ ?>
                                <div class="order-status">
                                    <form action="admin_order_details.php?id=2&&row=<?=$row['ID']; ?>" method="post">
                                        <span class="admin-form-control">ARE YOU SURE TO REJECT THIS ORDER?</span><br>
                                        <input type="submit" value="OK ✔" class="btn confirm ok">
                                        <a href="admin_order_details.php?row=<?=$ID ?>" class="confirm no">NO ✖</a>
                                    </form>
                                </div>
                            <?php }else if($row['Status']=='Pending'){ ?>
                                <div class="order-status">
                                    <a href="admin_order_details.php?row=<?=$row['ID']; ?>&&status=1" class="green-back">
                                        Accept Order
                                    </a>
                                    <a href="admin_order_details.php?row=<?=$row['ID']; ?>&&status=2" class="orange-back">
                                        Reject Order
                                    </a>
                                </div>
                            <?php }else if($row['Status']=='Accepted'){ ?>
                                <div class="accept-status">
                                    <span>Order Delivered</span>
                                </div>
                            <?php }else if($row['Status']=='Rejected'){ ?>
                                <div class="reject-status">
                                    <span>Order Rejected</span>
                                </div>
                            <?php }
                            ?>
                <h4 class="before-table">User Details</h4>
                <table class="user-details">
                    <tbody>
                        <tr>
                            <th>Order ID</th>
                            <td><?= $row['ID']; ?></td>
                        </tr>
                        <tr>
                            <th>Customer Name</th>
                            <td><?= $row['Cust_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Customer Mobile</th>
                            <td><?= $row['Cust_mobile']; ?></td>
                        </tr>
                        <tr>
                            <th>Customer Email</th>
                            <td><?= $row['Cust_email']; ?></td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td><?= $row['Cust_address']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <h4 class="before-table">Order Details</h4>
                <table class="order-details">
                    <tbody>
                        <tr>
                            <th>Order Items</th>
                            <td><?= $row['Order_item']; ?></td>
                        </tr>
                        <tr class="green" style="background:rgb(248 248 248)">
                            <th>Amount</th>
                            <td ><?= $row['Order_total']; ?>৳</td>
                        </tr>
                        <tr>
                            <th>Delivery Type/Time</th>
                            <td><?= $row['Del_type']; ?>/<?= $row['Del_time']; ?></td>
                        </tr>
                        <tr>
                            <th>Payment Type</th>
                            <td><?= $row['Payment_mode']; ?></td>
                        </tr>
                        <tr>
                            <th>Tips</th>
                            <td><?= $row['Tips']; ?></td>
                        </tr>
                        <tr>
                            <th>Notes</th>
                            <td><?= $row['Notes']; ?></td>
                        </tr>
                        
                        <tr>
                            <th>Order Time</th>
                            <td><?= $row['Order_time']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="after-table">
                    <a href="admin_order_details.php?row=<?=$row['ID']; ?>&&status=3" class="red-back">
                        Delete Order
                    </a>
                </div>
                
                <?php } ?>
                        <?php }else{ ?>

                        <?php }
                    ?>
            </div>
        </div>
    </section>
    <!-- FOOTER -->
    <?php include 'footer.php'; ?>
</body>
</html>