<?php include 'header.php'; ?>
<head>
    <title>Contact Details</title>
</head>
<body>
    <?php
        $ID = $_REQUEST['row'];
        if(isset($_REQUEST['id']) && $_REQUEST['id']==3){
            $sql = "DELETE FROM contact_us WHERE ID='$ID'";
            $result = $con->query($sql);
            header('location: admin_contact.php');
        }


    ?>
    <!-- BODY -->
    <section class="bg-row text-center">
        <div class="container">
            <ul>
                <li class="nav-item"><a href="#">Contact Details</a></li>
            </ul>
        </div>
    </section>
    <section class="grey-bg padding60">
        <div class="container">
            <div class="container-full">
                <div class="back-to">
                    <a href="admin_contact.php"><i class="fas fa-arrow-left"></i> Back to Contact List</a>
                </div>
                <?php
                    $ID = $_REQUEST['row'];
                    $sql = "SELECT * FROM contact_us WHERE ID='$ID'";
                    $result = $con->query($sql);
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                            if(isset($_REQUEST['status']) && $_REQUEST['status']==3){ ?>
                                <div class="order-status">
                                    <form action="admin_contact_details.php?id=3&&row=<?=$row['ID']; ?>" method="post">
                                        <span class="admin-form-control">ARE YOU SURE TO DELETE THIS MESSAGE?</span><br>
                                        <input type="submit" value="OK ✔" class="btn confirm ok">
                                        <a href="admin_contact_details.php?row=<?=$ID ?>" class="confirm no">NO ✖</a>
                                    </form>
                                </div>
                            <?php }?>
                <h4 class="before-table">Contact Message Details</h4>
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
                            <th>Mobile</th>
                            <td><?= $row['Mobile']; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= $row['Email']; ?></td>
                        </tr>
                        <tr>
                            <th>Message</th>
                            <td><?= $row['Message']; ?></td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td><?= $row['Send_time']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="after-table">
                    <a href="admin_contact_details.php?row=<?=$row['ID']; ?>&&status=3" class="red-back">
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