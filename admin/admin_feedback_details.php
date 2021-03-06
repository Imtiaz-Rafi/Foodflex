<?php include 'header.php'; ?>
<head>
    <title>Feedback</title>
</head>
<body>
    <?php
        $ID = $_REQUEST['row'];
        if(isset($_REQUEST['id']) && $_REQUEST['id']==3){
            $sql = "DELETE FROM feedback WHERE ID='$ID'";
            $result = $con->query($sql);
            header('location: admin_feedback.php');
        }
    ?>
    
    <!-- BODY -->
    <section class="bg-row text-center">
        <div class="container">
            <ul>
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
                            if(isset($_REQUEST['status']) && $_REQUEST['status']==3){ ?>
                                <div class="order-status">
                                    <form action="admin_feedback_details.php?id=3&&row=<?=$row['ID']; ?>" method="post">
                                        <span class="admin-form-control">ARE YOU SURE TO DELETE THIS FEEDBACK MESSAGE?</span><br>
                                        <input type="submit" value="OK ✔" class="btn confirm ok">
                                        <a href="admin_feedback_details.php?row=<?=$ID ?>" class="confirm no">NO ✖</a>
                                    </form>
                                </div>
                            <?php }?>
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
    <?php include 'footer.php'; ?>
</body>
</html>