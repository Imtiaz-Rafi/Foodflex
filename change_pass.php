<?php
    session_start();
    include 'Connection.php';
    include 'login/login_check.php';
    $data = is_logged($con);
?>
<?php

if($data){
    $ID = $data["ID"];/* userid of the user */
}

?>
<?php
    $oldpass = $newpass = $conpass = $message = "";
    $oldpasserr = $newpasserr = $conpasserr= "";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $oldpass = test_data($_REQUEST["oldpass"]);
        $newpass = test_data($_REQUEST["newpass"]);
        $conpass = test_data($_REQUEST["conpass"]);
        if($newpass!=$conpass){
            $conpasserr = "*Password Doesn't Match";
        }
        
        
        if(empty($newpasserr) && empty($conpasserr) &&empty($oldpasserr)){
            //--Check Duplicate--
            $sql = "SELECT * FROM customers where ID='$ID'";
            $result = $con->query($sql);
            while($row = $result->fetch_assoc()){
                if(($row["Password"]==$oldpass) && ($newpass==$conpass))
                {
                    $sql="UPDATE customers SET Password='$newpass' where ID='$ID'";
                    $query_run=mysqli_query($con,$sql);
                    if($query_run)
                    {
                        $message = "Password Changed Sucessfully";
                        header('location: profile.php?msg=1');
                    }   
                    else
                    {
                        $message = "Password is not correct";
                        header("location: change_pass.php?msg=error");
                    }
                }else{
                    if($row["Password"]!=$oldpass){
                        $oldpasserr = "Old Password Doesn't match";
                    }else{
                        header("location: change_pass.php?msg=error");
                    }
                }
            }
        }
    }
            
    function test_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" href="../../fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../../fontawesome/css/all.css">
    <script src="../../fontawesome/js/fontawesome.min.js"></script>
    <link rel="stylesheet" href="css/changepss.css">

    <title>Change password</title>
</head>
    <body class="password">
    
        <div class="password-in">
            
            
            <h2>Change your password</h2>
            <div>
                <?php
                if(isset($_GET['msg']) && $_GET['msg']==1){
                    echo "*Password Changed Sucessfully";
                }else if(isset($_GET['msg']) && $_GET['msg']=="error"){
                    echo "*Password is not correct";
                } ?>
            </div>
            <hr>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                
                <div class="oldPass">

                    <i class="fas fa-lock" id="icon"></i>
                    <input type= "password" class="input-box" placeholder="Enter your old Password" name="oldpass" size="25" required>
                    <span class="error"><br><?php echo $oldpasserr;?></span>
                </div>
                <div class="newPass">
                    <i class="fas fa-lock" id="icon"></i>
                    <input type= "password" class="input-box" placeholder="Enter your new Password" name="newpass" size="25" required>
                    
                </div>
                <div class="conPass">
                    <i class="fas fa-lock" id="icon"></i>
                    <input type= "password" class="input-box" placeholder="Confirm Password" name="conpass" size="25" required>
                    <span class="error"><br><?php echo $conpasserr;?></span>
                    
                </div>
                <hr>
                <input type="submit" value="submit" class="submit">
                <hr>
                
            </form>
            
        </div>
    </body>
</html>