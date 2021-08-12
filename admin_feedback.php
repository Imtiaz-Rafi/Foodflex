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
    <title>All Feedback</title>
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
                <li class="nav-item"><a href="#">Feedback List</a></li>
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
    <footer class="footer">
        <div class="container">
            <p>&copy; Copyright Foodflex.com 2021 | All rights reserved.</p>
        </div>
    </footer>
</body>
</html>