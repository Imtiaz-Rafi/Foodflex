<?php
    session_start();
    include 'Connection.php';
    include 'login/login_check.php';
    $data = is_logged($con);
?>
<?php
    $ID = $data['ID'];
    $sql = "SELECT * FROM customers WHERE ID='$ID'";
    $result = $con->query($sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['Name']=$row["Name"];
            $_SESSION['Email']=$row['Email'];
            $_SESSION['Mobile']=$row['Mobile'];
            $_SESSION['City']=$row['City'];
            $_SESSION['Address']=$row['Address'];


        }    
    }
?> 
<!DOCTYPE html>
<html>
<head>
    <?php include 'links.php';?>    
    <link rel="stylesheet" href="css/pro.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Profile Page</title>
</head>
<body>
    <?php include 'header.php';?>

    <?php
    $Mobile = $City = $Address = $CityErr = $MobileErr = $AddressErr ="";
    if(isset($_POST['submit']))
    {
        $Mobile = test_data($_REQUEST["mobile"]);
        if(strlen($Mobile)<11 || strlen($Mobile)>11){
            $MobileErr = "*Invalid Mobile Format";
        }
        $City = test_data($_REQUEST['city']);
        if (!preg_match("/^[1-9a-zA-Z-', ]*$/",$City)) {
            $CityErr = "Only letters and white space allowed";
        }

        $Address = test_data($_REQUEST["address"]);
        if (!preg_match("/^[1-9a-zA-Z-', ]*$/",$Address)) {
            $AddressErr = "Only letters and white space allowed";
        }

        if(empty($MobileErr) && empty($CityErr) && empty($AddressErr)){
            $query="UPDATE customers SET mobile='$Mobile',city='$City',address='$Address'where id='{$_SESSION['ID']}'";
            $query_run=mysqli_query($con,$query);
    
            if($query_run)
            {
                $_SESSION['status']="Data updated successfully";
                header("location:profile.php?update=1");
            }
            else
            {
                $_SESSION['status']="Not updated ";
                header("location:profile.php");
            }
        }else{
            header("?msg=error");
        }
        
        

    }

    function test_data($value){
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }
    
    ?>
    <section class="bg-row text-center">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item"><h4>PROFILE</h4></li>
            </ul>
            
        </div>

    </section>
    <!-- BODY -->
   <?php
    if(isset($_SESSION['status']))
            {
               echo"<h4>".$_SESSION['status']."</h4>";
                unset($_SESSION['status']);
            }
            ?>
    <section class="profile-page">
        
        <div class="container">
            <div class="message">
                <?php
                if(isset($_REQUEST['update'])&&$_REQUEST['update']==1){
                   echo "your data has been updated";
                }else if(!empty($MobileErr)){ ?>
                    <span class="error"><?php echo $MobileErr;?></span>
                <?php }
                ?>
                
                
                <span class="error"><?php echo $CityErr;?></span>
                <span class="error"><?php echo $AddressErr;?></span>
               
            </div>
            <div class="wrapper">

                <form action="profile.php" method="post">

                    <h3 class="personal">Personal Information</h3>
                    <div class="input-Box">
                        <div id="divleft">
                            <label for="name">Name:</lable>
                            <input type= "Name"class="input-box" id ="name" name="name" placeholder=" Full Name" Value="<?php echo$_SESSION['Name'] ;?>" size="25" disabled required >
                        </div>
                    </div>
                    <div class="input-Box">
                        <div id="divright">
                            <label for="email">Email:</lable>
                            <input type="email"class="input-box" id="email" name="email" placeholder="Email Address" value="<?php echo$_SESSION['Email'] ; ?>" size="25" disabled required>
                        </div>
                    </div>
                    <div class="input-Box">
                        <div id="divleft">
                            <label for="mobile">Mobile:</lable>
                            <input type="phone" class="input-box"id="mobile" name="mobile" placeholder="Mobile no." value="<?php echo$_SESSION['Mobile'] ;?>" size="25" required>
                            
                        </div>
                    </div>
                    <div class="input-Box">
                        <div id="divright">
                            <label for="city">City:</lable> 
                            <input type="text"class="input-box" id="city" name="city" placeholder="Enter your city" value="<?php echo$_SESSION['City'] ;?>" size="25" required>
                            
                        </div> 
                    </div>
                    <div class="input-Box">
                        <div id="divleft">
                            <label for="Address">Address:</lable> 
                            <input type="text"class="input-box" id="address" name="address" placeholder="Enter your Address" value="<?php echo$_SESSION['Address'] ;?>" size="30" required>
                            
                        </div> 
                    </div>
                    <div class="Change-pass">  
                            <p> Do you want to change your password?
                                <a href="change.php">Click here</a>
                            </p>
                    </div>

                    <div>
                        <button type="submit" name="submit" class="btn"><h3>Update Profile</h3></button>
                    </div>
                </form>
            </div>
        </div>
    </section>
   <!-- FOOTER -->
   <?php include 'footer.php';?>
</body>
</html>