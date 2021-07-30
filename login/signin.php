<?php
    session_start();
    include '../Connection.php';
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

    <title>Login</title>
</head>
    <body class="Sign-In-body">
        <?php
            $Email = $Password = "";
            $EmailErr = $PassErr = "";
            if($_SERVER['REQUEST_METHOD']=='POST'){
                
                $Email = test_data($_REQUEST["email"]);
                if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                    $EmailErr = "Invalid email format";
                    }
                $Password = test_data($_REQUEST["pass"]);
                
                if(empty($EmailErr) && empty($PassErr)){
                    //--Check Duplicate--
                    $query = "SELECT * FROM customers";
                    $result = $con->query($query);
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                            if(($row["Email"] == $Email) && ($row["Password"]==$Password)){
                                $_SESSION['Name'] = $Name = $row["Name"];
                                $_SESSION['ID'] = $row['ID'];
                                header("location: ../index.php");
                                die();
                            }else if(($row["Email"] == $Email) && ($row["Password"]!=$Password)){
                                header("location: signin.php?wrong=0");
                            }else{
                                header("location: signin.php?wrong=1");
                            }
                        }
                    }else{
                        header('location: signin.php?wrong=1');
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
                <a href="../index.php"><i class="fas fa-arrow-left"></i></a>
                <i class="far fa-user-circle fa-3x"></i>
            </div>
            
            <h2>Log In to Your Account</h2>
            <?php
                if(isset($_GET['wrong'])){
                    if($_GET['wrong']==0){ ?>
                        <p class="recheck">* Wrong E-mail/Password.</p>
                    <?php }else if($_GET['wrong']==1){ ?>
                        <p class="recheck">* Invalid Email. SignUp First.</p>
                    <?php }?>
                    
            <?php } ?>
            <hr>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="Email">
                    <i class="far fa-envelope" id="icon"></i>
                    <input type= "email" class="input-box" placeholder="Enter your Email" name="email" size="25" required>
                    <span class="error"><br><?php echo $EmailErr;?></span>
                </div>
                <div class="Pass">
                    <i class="fas fa-lock" id="icon"></i>
                    <input type= "password" class="input-box" placeholder="Enter your Password" name="pass" size="25" required>
                    <span class="error"><br><?php echo $PassErr;?></span>
                </div>
                <hr>
                <input type="submit" value="Log In" class="submit">
                <hr>
                <div class="Sign-up">Don't have an account? <a href="signup.php">Sign Up</a> Now </div>
            </form>
            
        </div>
    </body>
</html>