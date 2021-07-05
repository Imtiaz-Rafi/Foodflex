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
    <link rel="stylesheet" href="../css/signup.css">

    <title>Sign up</title>
</head>
<body class="body">
        <?php
            $Name = $Email = $Password = $Mobile = $ConPass="";
            $NameErr = $EmailErr = $PassErr = $MobileErr = $ConPassErr = $ConPassErr2 ="";
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if (empty($_REQUEST["name"])) {
                    $NameErr = "*Name is required";
                } else {
                    $Name = test_data($_REQUEST["name"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$Name)) {
                        $NameErr = "Only letters and white space allowed";
                      }
                }
                if(empty($_REQUEST["mobile"])){
                    $MobileErr = "*Mobile is required";
                }else{
                    $Mobile = test_data($_REQUEST["mobile"]);
                    if(strlen($Mobile)<11 || strlen($Mobile)>11){
                        $MobileErr = "*Invalid Mobile Format";
                    }
                }
                if(empty($_REQUEST["email"])){
                    $EmailErr = "*Email is required";
                }else{
                    $Email = test_data($_REQUEST["email"]);
                    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                        $EmailErr = "Invalid email format";
                      }
                }
                if(empty($_REQUEST["pass"])){
                    $PassErr = "*Password is required";
                }else{
                    $Password = test_data($_REQUEST["pass"]);
                }
                if(empty($_REQUEST["conpass"])){
                    $ConPassErr = "*Confirm Password is required";
                }else if($_REQUEST["conpass"]!=$_REQUEST["pass"]){
                    $ConPassErr2 = "*Password Doesn't Match";
                }else{
                    $ConPass = test_data($_REQUEST["conpass"]);
                }
                
                if(empty($NameErr) && empty($MobileErr) && empty($EmailErr) && empty($PassErr) && empty($ConPassErr) && empty($ConPassErr2)){
                    //--INSERT DATA--
                    $sql = "SELECT * FROM customers ORDER BY ID DESC LIMIT 1";
                    $result = $con->query($sql);
                    $ID = 0;
                    while($row=$result->fetch_assoc()){
                        $ID = $row['ID'];
                    }
                    $ID = $ID+1;
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
                        $_SESSION['Name'] = $Name;
                        $_SESSION['ID'] = $ID;
                        header("location: ../index.php");
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
            <a href="../index.php"><li class="fas fa-arrow-left"></li></a>
            <li class="far fa-user-circle fa-3x"></li>
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
                <li class="far fa-user" id="icon"></li>
                <input type= "Name" class="input-box" placeholder="Enter your Name" name="name" size="25">
                <span class="error"><br><?php echo $NameErr;?></span>
            </div>
            <div class="Mobile">
                <li class="fas fa-phone-alt" id="icon"></li>
                <input type= "phone" class="input-box" placeholder="Enter your Mobile No." name="mobile" size="25">
                <span class="error"><br><?php echo $MobileErr;?></span>
            </div>
            <div class="Email">
                <li class="far fa-envelope" id="icon"></li>
                <input type= "email" class="input-box" placeholder="Enter your Email" name="email" size="25">
                <span class="error"><br><?php echo $EmailErr;?></span>
            </div>
            <div class="Pass">
                <li class="fas fa-lock" id="icon"></li>
                <input type= "password" class="input-box" placeholder="Enter your Password" name="pass" size="25">
                <span class="error"><br><?php echo $PassErr;?></span>
            </div>
            <div class="ConPass">
                <li class="fas fa-lock" id="icon"></li>
                <input type= "password" class="input-box" placeholder="Confirm Password" name="conpass" size="25">
                <span class="error"><br><?php echo $ConPassErr;?></span>
                <span class="error"><?php echo $ConPassErr2;?></span>
            </div>
            <hr>
            <input type="submit" value="Sign up" class="submit">
            <hr>
            <div class="sign-in">Do you have an account already? <a href="signin.php">Sign in</a> </div>
        </form>
        
    </div>
</body>
</html>