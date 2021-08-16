<?php include 'header.php'; ?>
<head>
    <title>Contact List</title>
</head>
<body>
    <!-- BODY -->
    <section class="bg-row text-center">
        <div class="container">
            <ul>
                <li class="nav-item"><a href="#">Contact List</a></li>
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
                                <th>ID</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Time</th>
                                <th>Details</th>
                                
                            </tr>
                        </thead>
                        <tbody class="order-table-body">
                            <?php
                                $sql = "SELECT * FROM contact_us ORDER BY ID DESC";
                                $result = $con->query($sql);
                                if($result->num_rows>0){
                                    while($row = $result->fetch_assoc()){ ?>
                                        <tr>
                                            <td><?= $row['ID']; ?></td>
                                            <td><?= $row['Name']; ?></td>
                                            <td><?= $row['Mobile']; ?></td>
                                            <td><?= $row['Email']; ?></td>
                                            <td><p class="elipsis"><?= $row['Message']; ?></p></td>
                                            <td><?= $row['Send_time']; ?></td>
                                            <td>
                                                <button class="crud" style="float:none">
                                                    <a href="admin_contact_details.php?row=<?=$row['ID']; ?>">
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