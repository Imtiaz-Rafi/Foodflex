<?php include 'header.php'; ?>
<head>
    <title>All Order</title>
</head>
<body>
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
                    <a href="index.php"><i class="fas fa-arrow-left"></i> Back to Admin Home</a>
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
    <?php include 'footer.php'; ?>
</body>