<?php include 'header.php'; ?>
<head>
    <title>Admin</title>
</head>
<body>
    <!-- BODY -->
    <section class="bg-row text-center">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#">Admin</a></li>
            </ul>
        </div>
    </section>
    <section class="grey-bg padding60">
        <div class="container">
            <div class="container-full">
                <div class="admin-container">
                    <div class="admin-box">
                        <a href="admin_menu.php"><span>Manage Food Menu</span><i class="fas fa-angle-double-right"></i></a>
                    </div>
                    <div class="admin-box">
                        <a href="admin_order.php"><span>Manage Order List</span><i class="fas fa-angle-double-right"></i></a>
                    </div>
                    <div class="admin-box">
                        <a href="admin_contact.php"><span>Contact Message</span><i class="fas fa-angle-double-right"></i></a>
                    </div>
                    <div class="admin-box">
                        <a href="admin_feedback.php"><span>Feedback</span><i class="fas fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FOOTER -->
    <?php include "footer.php"; ?>
</body>
</html>