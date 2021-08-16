<?php include 'header.php'; ?>
<head>
    <title>All Feedback</title>
</head>
<body>
    <!-- BODY -->
    <section class="bg-row text-center">
        <div class="container">
            <ul>
                <li class="nav-item"><a href="#">Feedback List</a></li>
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
                                <th>Email</th>
                                <th>Delivery Time</th>
                                <th>Food Quality</th>
                                <th>Hospitality</th>
                                <th>Description</th>
                                <th>Time</th>
                                <th>Details</th>
                                
                            </tr>
                        </thead>
                        <tbody class="order-table-body">
                            <?php
                                $sql = "SELECT * FROM feedback ORDER BY ID DESC";
                                $result = $con->query($sql);
                                if($result->num_rows>0){
                                    while($row = $result->fetch_assoc()){ ?>
                                        <tr>
                                            <td><?= $row['ID']; ?></td>
                                            <td><?= $row['Name']; ?></td>
                                            <td><?= $row['Email']; ?></td>
                                            <td><?= $row['Del_time']; ?></td>
                                            <td><?= $row['Food_quality']; ?></td>
                                            <td><?= $row['Hospitality']; ?></td>
                                            <td><p class="elipsis"><?= $row['Description']; ?></p></td>
                                            <td><?= $row['submission_time']; ?></td>
                                            <td>
                                                <button class="crud" style="float:none">
                                                    <a href="admin_feedback_details.php?row=<?=$row['ID']; ?>">
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
</html>