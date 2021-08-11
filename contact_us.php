<?php
    session_start();
    include 'Connection.php';
    include 'login/login_check.php'; 
    $data = is_logged($con); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php';?>
    <link rel="stylesheet" href="css/cart.css">
    <title>Contact Us</title>
</head>
<body>
    <!-- HEADER -->
    <?php include 'header.php';?>
    <section class="bg-row text-center">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#">Contact US</a></li>
                <!-- <li class="nav-item"><a href="#">Info</a></li> -->
            </ul>
        </div>
    </section>
    <section class="grey-bg">
        <div class="container">
            <div class="container-full">
                <div class="cart-main">
                    <div class="contact-content">
                        <h1>Contact Us</h1>
                        <p>
                            You can send a message at 
                            <a href="mailto:foodflexadmin@gmail.com" target="_blank">foodflexadmin@gmail.com</a> <br>
                          or contact us at 0125 0258
                        </p>
                        <a href="#contact">
                            <button class="read-more">
                                Read more
                            </button>
                        </a>
                        <a id="contact" class="after-contact"></a>
                        <form action="" method="post">
                            <label for="name">Name*</label><br>
                            <input type="name" id="name" placeholder="Your Name" name="name" required><br>
                            <label for="email">Email*</label><br>
                            <input type="email" id="email" placeholder="mail@example.com" name="email" required><br>
                            <label for="mobile">Mobile*</label><br>
                            <input type="mobile" id="mobile" placeholder="+012345" name="mobile" required><br>
                            <label for="message">Message</label><br>
                            <input type="text" id="message" placeholder="Your message" name="message"><br>
                            <input type="checkbox" id="confirmation" name="confirm" required>
                            <label for="confirmation">I confirm that i have read and agree the contents of the privacy statement*</label><br>
                            <input type="submit" value="Send"><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FOOTER -->
    <?php include 'footer.php';?>
</body>
</html>