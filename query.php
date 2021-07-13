<?php
    session_start();
    include 'Connection.php';
    $value = "";
    if(isset($_REQUEST['value'])){
        $_SESSION['value'] = $_REQUEST['value'];
        $value = $_SESSION['value'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div>This is Query</div>
    <?php
     if(!empty($value)){
         if($value==5){
            header("location: miliscam.php?haha=$value ");
         }else{
            header('location: index.php?lol=$value');
        }
         
     }else{
         header('location: index.php');
     }
     
     ?> 
</body>
</html>
        <?php
        // $sql = "SELECT * FROM customers WHERE ID=56";
        // $result = $con->query($sql);
        // while($row = $result->fetch_assoc()){
        //     echo $row['ID']."<br>".$row['Name']."<br>".$row['Mobile']."<br>";
        //     echo $_SESSION['ID'] = $row['ID'];
        //     echo $_SESSION['Name'] = $row['Name'];
        // }








        // $name = "Imtiaz rafi";
        //     $Email = $password = ""; 
        //     if($_SERVER['REQUEST_METHOD']=="GET"){
        //         $Email = $_REQUEST["email"];
        //         $password = $_REQUEST["pass"];
        //         // //--INSERT DATA--
        //         // $sql = "INSERT INTO login(ID,Email,Password)
        //         //     VALUES('0','$Email','$password')";

        //         // if($con->query($sql) === TRUE){
        //         //     $last_id = $con->insert_id;
        //         //     header("location: index.php?msg=successful");
        //         //     //echo "NEW Record created successfully" .$last_id;
        //         // }else{
        //         //     //echo "ERROR: " .$sql . "<br>" .$con->error;
        //         //     header("location: signin.php?msg=error");
        //         // }
        //         $query = "select * from customers";
        //         $result = $con->query($query);
        //         while($row = $result->fetch_assoc()){
        //             if(($row["Email"] == $Email) && ($row["Password"]==$password)){
        //                 header("location: index.php?name=$name");
        //             }else{
        //                 header("location: signin.php?wrong=0");
        //             }
        //         }

        //     }
        //     function test_data($data){
        //         $data = trim($data);
        //         $data = stripslashes($data);
        //         $data = htmlspecialchars($data);
        //         return $data;
        //     }
        //     //$con->close();
        ?>