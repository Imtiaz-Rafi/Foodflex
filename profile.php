<?php

session_start();

$_SESSION['ID'];

include 'connection.php';
?>

        <?php 
            
            $sql = "SELECT * FROM customers WHERE id='{$_SESSION['ID']}'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['Name']=$row["Name"];
                    $_SESSION['Email']=$row['Email'];
                    $_SESSION['Mobile']=$row['Mobile'];

                }    
                }
            ?>
            
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="css/pro.css">
    <title>Profile Page</title>
</head>
<body class="profile-page">
    <div class="wrapper">
        <h2>Profile</h2>
        <form action="" method="post">
            <h4> Personal Information</h4>
            <hr>
            <div class="input-Box">
                <div id="divleft">
               <label for="name">Name:</lable>
               <input type= "Name"class="input-box" id ="name"name="name"placeholder=" Full Name" Value="<?php echo$_SESSION['Name'] ;?>" required >
            </div>
            </div>
            <div class="input-Box">
            <div id="divright">
            <label for="email">Email:</lable><input type="email"class="input-box" id="email" name="email" placeholder="Email Address" value="<?php echo$_SESSION['Email'] ; ?>" disabled required>
            </div>
            </div>
            <div class="input-Box">
            <div id="divleft">
            <label for="mobile">Mobile:</lable><input type="phone" class="input-box"id="mobile" name="mobile" placeholder="Mobile no." value="<?php echo$_SESSION['Mobile'] ;?>" required>
            </div>
            </div>
            <div class="input-Box">
            <div id="divright">
            <label for="city">City:</lable> <input type="text"class="input-box" id="city" name="city" placeholder="city" value="" required>
            </div> 
            </div>
           
            
            <div>
                <button type="submit" name="submit" class="btn"><h3>Update Profile</h3></button>
            </div>
        </form>
    </div>
</body>
</html>
    
{"mode":"full","isActive":false}