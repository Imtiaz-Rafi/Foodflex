<?php include 'Connection.php'?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/Logo_02.png" type="image/png">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <script src="fontawesome/js/fontawesome.min.js"></script>
    <link rel="stylesheet" href="css/signin.css">

    <title>Sign-In</title>
</head>
    <body class="body">
        <?php
            $Email = $Password = "";
            $EmailErr = $PassErr = "";
            if($_SERVER['REQUEST_METHOD']=='POST'){
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
                
                if(empty($EmailErr) && empty($PassErr)){
                    //--Check Duplicate--
                    $query = "select * from customers";
                    $result = $con->query($query);
                    while($row = $result->fetch_assoc()){
                        if(($row["Email"] == $Email) && ($row["Password"]==$Password)){
                            $Name = $row["Name"];
                            header("location: index.php?name=$Name");
                            return;
                        }else{
                            header("location: signin.php?wrong=0");
                        }
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
    <div class="Sign-in">
        <div class="back">
            <a href="index.php"><li class="fas fa-arrow-left"></li></a>
            <li class="far fa-user-circle fa-3x"></li>
        </div>
        
        <h2>Sign In to Your Account</h2>
        <?php
        //echo isset($_GET['wrong']);
            if(isset($_GET['wrong'])){ ?>
                <p class="recheck">* Wrong E-mail/Password.</p>
        <?php } ?>
        <hr>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
            <hr>
            <input type="submit" value="Sign In" class="submit">
            <hr>
            <div class="Sign-up">Don't have an account? <a href="signup.php">Sign Up</a> Now </div>
        </form>
        
    </div>
    </body>
</html>