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
                            You can send a message or contact us at <span class="green font-500">0125 0258</span> 
                        </p>
                        <a href="#contact">
                            <button class="read-more">
                                Read more
                            </button>
                        </a>
                        <a id="contact" class="after-contact"></a>
                        <form action="" method="post">
                            <div class="contact-input">
                                <div class="grid-col-half">
                                    <label for="name" class="label">Name*</label>
                                    <input type="name" id="name" placeholder="Your Name" name="name" required>
                                </div>
                                <div class="css-0">
                                    <label for="email" class="label">Email*</label>
                                    <input type="email" id="email" placeholder="mail@example.com" name="email" required>
                                </div>
                                <div class="css-0">
                                    <label for="mobile" class="label">Mobile*</label>
                                    <input type="mobile" id="mobile" placeholder="+012345" name="mobile" required>
                                </div>
                                <div class="grid-col-half">
                                    <label for="message" class="label">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="5" placeholder="Your message"></textarea>
                                </div>
                                <!-- <div class="grid-col-half">  
                                </div> -->
                            </div>
                            <div class="confirm">
                                <input type="checkbox" id="confirmation" name="confirm" required>
                                <label for="confirmation">
                                    I confirm that i have read and agree the contents of the privacy statement*
                                </label>
                            </div>
                            <div>
                                <input type="submit" value="Send" class="send">
                            </div>
                            
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