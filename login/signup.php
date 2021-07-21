<?php
    session_start();
    include '../Connection.php';
    include 'login_check.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/Logo_02.png" type="image/png">
    <link rel="stylesheet" href="../../fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../../fontawesome/css/all.css">
    <script src="../../fontawesome/js/fontawesome.min.js"></script>
    <link rel="stylesheet" href="../css/login.css">

    <title>Sign up</title>
</head>
<body class="Sign-Up-body">
        <?php
            $Name = $FName = $SName = $Email = $Password = $Mobile = $ConPass="";
            $FNameErr = $SNameErr = $EmailErr = $PassErr = $MobileErr = $ConPassErr = $ConPassErr2 ="";
            if($_SERVER['REQUEST_METHOD']=='POST'){
            
                $FName = test_data($_REQUEST["fname"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/",$FName)) {
                    $FNameErr = "Only letters and white space allowed";
                }
                $SName = test_data($_REQUEST["sname"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/",$SName)) {
                    $SNameErr = "Only letters and white space allowed";
                }
                $Mobile = test_data($_REQUEST["mobile"]);
                if(strlen($Mobile)<11 || strlen($Mobile)>11){
                    $MobileErr = "*Invalid Mobile Format";
                }
                $Email = test_data($_REQUEST["email"]);
                if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                    $EmailErr = "Invalid email format";
                }
                $Password = test_data($_REQUEST["pass"]);
                if($_REQUEST["conpass"]!=$_REQUEST["pass"]){
                    $ConPassErr = "*Password Doesn't Match";
                }else{
                    $ConPass = test_data($_REQUEST["conpass"]);
                }
                
                if(empty($FNameErr) && empty($SNameErr) && empty($MobileErr) && empty($EmailErr) && empty($PassErr) && empty($ConPassErr) && empty($ConPassErr2)){
                    //--INSERT DATA--
                    $sql = "SELECT * FROM customers ORDER BY ID DESC LIMIT 1";
                    $result = $con->query($sql);
                    $ID = 0;
                    while($row=$result->fetch_assoc()){
                        $ID = $row['ID'];
                    }
                    $ID = $ID+1;
                    $Name = $FName." ".$SName;
                    $sql = "INSERT INTO customers(ID,Name,Mobile,Email,Password)
                        VALUES('$ID','$Name','$Mobile','$Email','$Password')";
                   

                    //--Check Duplicate--
                    $query = "SELECT * FROM customers";
                    $result = $con->query($query);
                    while($row = $result->fetch_assoc()){
                        if(($row["Email"] === $Email)){
                            header("location: signup.php?wrong_mail=0");
                            return;
                        }else if(($row["Mobile"] === $Mobile)){
                            header("location: signup.php?wrong_mobile=0");
                            return;
                        }else{
                            continue;
                        }
                    }
                    if($con->query($sql)===TRUE){
                        header("location: signin.php");
                        return;
                    }else{
                        header("?msg=error");
                    }
                    
                }else{
                    header("?msg=error");
                }
            }
            function test_data($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>
    <div class="Sign-up">
        <div class="back">
            <a href="../index.php"><i class="fas fa-arrow-left"></i></a>
            <i class="far fa-user-circle fa-3x"></i>
        </div>
        <h2>Sign Up to Your Account</h2>

        <?php
        //echo isset($_GET['wrong']);
            if(isset($_GET['wrong_mail'])){ ?>
                <p class="recheck">* This E-mail is already signed in.</p>
        <?php }else if(isset($_GET['wrong_mobile'])){ ?>
                <p class="recheck">* This Mobile is already signed in.</p>
        <?php }?>
        <hr>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="Name">
                <i class="far fa-user" id="icon"></i>
                <input type= "Name" class="input-box first" placeholder="First Name" name="fname" size="10" required>
                <input type= "Name" class="input-box second" placeholder="Surname" name="sname" size="7" required>
                <span class="error"><br><?php echo $FNameErr;?></span>
                <span class="error"><?php echo $SNameErr;?></span>
            </div>
            <div class="Mobile">
                <i class="fas fa-phone-alt" id="icon"></i>
                <input type= "phone" class="input-box" placeholder="Mobile Number" name="mobile" size="25" required>
                <span class="error"><br><?php echo $MobileErr;?></span>
            </div>
            <div class="Email">
                <i class="far fa-envelope" id="icon"></i>
                <input type= "email" class="input-box" placeholder="Email" name="email" size="25" required>
                <span class="error"><br><?php echo $EmailErr;?></span>
            </div>
            <div class="Pass">
                <i class="fas fa-lock" id="icon"></i>
                <input type= "password" class="input-box" placeholder="Password" name="pass" size="25" required>
                <span class="error"><br><?php echo $PassErr;?></span>
            </div>
            <div class="ConPass">
                <i class="fas fa-lock" id="icon"></i>
                <input type= "password" class="input-box" placeholder="Confirm Password" name="conpass" size="25" required>
                <span class="error"><br><?php echo $ConPassErr;?></span>
            </div>
            <hr>
            <input type="submit" value="Sign up" class="submit">
            <hr>
            <div class="Sign-in">Already have an account? <a href="signin.php">Log In</a> </div>
        </form>
        
    </div>
</body>
</html>