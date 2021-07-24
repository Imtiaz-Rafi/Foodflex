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
    $Mobile = $city=$address="";
    if(isset($_POST['submit']))
    {
        $mobile=$_POST['mobile'];
        $city=$_POST['city'];
        $address=$_POST['address'];
        $query="UPDATE customers SET mobile='$mobile',city='$city',address='$address'where id='{$_SESSION['ID']}'";
        $query_run=mysqli_query($con,$query);

        if($query_run)
        {
            $_SESSION['status']="Data updated successfully";
            header("location:profile.php");
        }
        else
        {
            $_SESSION['status']="Not updated ";
            header("location:profile.php");
        }
        

    }?>
    <section class="bg-row text-center">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item"><h4>PROFILE</h4></li>
            </ul>
        </div>
    </section>
    <!-- BODY -->
    <section class="profile-page">
        <div class="container">
            <div class="wrapper">
                <form action="profile.php" method="post">
                    <h3 class="personal">Personal Information</h3>
                    <div class="input-Box">
                        <div id="divleft">
                            <label for="name">Name:</lable>
                            <input type= "Name"class="input-box" id ="name" name="name" placeholder=" Full Name" Value="<?php echo$_SESSION['Name'] ;?>" size="25" required >
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
                            <!-- <textarea class="input-box" name="address" id="address" placeholder="Enter your Address" value="<?php //echo$_SESSION['Address'] ;?>" cols="30" rows="4" required></textarea> -->
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

            
    
