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
    <!-- <link rel="stylesheet" href="css/cart.css"> -->
    <title>Feedback</title>
</head>
<body>
    <?php
        $ID = $_REQUEST['row'];
        if(isset($_REQUEST['status']) && $_REQUEST['status']==3){
            $sql = "DELETE FROM feedback WHERE ID='$ID'";
            $result = $con->query($sql);
            header('location: admin_feedback.php');
        }


    ?>
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
                <li class="nav-item"><a href="#">Feedback Details</a></li>
            </ul>
        </div>
    </section>
    <section class="grey-bg padding60">
        <div class="container">
            <div class="container-full">
                <div class="back-to">
                    <a href="admin_feedback.php"><i class="fas fa-arrow-left"></i> Back to Feedback List</a>
                </div>
                <?php
                    $ID = $_REQUEST['row'];
                    $sql = "SELECT * FROM feedback WHERE ID='$ID'";
                    $result = $con->query($sql);
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                            ?>
                <h4 class="before-table">Feedback Details</h4>
                <table class="user-details">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td><?= $row['ID']; ?></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><?= $row['Name']; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= $row['Email']; ?></td>
                        </tr>
                        <tr>
                            <th>Delivery on Time</th>
                            <td><?= $row['Del_time']; ?></td>
                        </tr>
                        <tr>
                            <th>Food was Good</th>
                            <td><?= $row['Food_quality']; ?></td>
                        </tr>
                        <tr>
                            <th>Hospitality</th>
                            <td><?= $row['Hospitality']; ?></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><?= $row['Description']; ?></td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td><?= $row['submission_time']; ?></td>
                        </tr>
                    </tbody>
                </table>

                <div class="after-table">
                    <a href="admin_feedback_details.php?row=<?=$row['ID']; ?>&&status=3" class="red-back">
                        Delete
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
    <footer class="footer">
        <div class="container">
        
            <p>&copy; Copyright Foodflex.com 2021 | All rights reserved.</p>
            
        </div>
    </footer>
</body>
</html>