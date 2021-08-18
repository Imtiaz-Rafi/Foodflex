<?php include 'header.php';?>
<head>
    <title>Contact Us</title>
</head>
<body>
    <?php
    $ID = $Name = $Email = $Mobile = $Message = "";
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $Name = test_data($_REQUEST["name"]);
            $Email = test_data($_REQUEST["email"]);
            $Mobile = test_data($_REQUEST["mobile"]);
            $Message = test_data($_REQUEST["message"]);
            $sql = "INSERT INTO contact_us(ID,Name,Mobile,Email,Message)
            VALUES(0,'$Name','$Mobile','$Email','$Message')";
            $result = $con->query($sql);
            if($result){
                header('location: contact_us.php?success=1');
            }else{
                echo "Something Wrong";
            }
        }
        function test_data($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
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
                        <?php
                            if(isset($_REQUEST['success']) && $_REQUEST['success']==1){ ?>
                                <div class="success">
                                    <span>Your Message Sent Successfully.</span>
                                </div>
                            <?php }
                        ?>
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