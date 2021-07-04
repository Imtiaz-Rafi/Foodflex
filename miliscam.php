<?php
      session_start();
      include 'Connection.php';
      include 'login/login_check.php';
      $data = is_logged($con);
?>
        <?php
        if($data){
          echo $data['Name'];
        }
        
        // $sql = "SELECT * FROM food_cat WHERE ID=10001";
        // $result = $con->query($sql);

        // if ($result->num_rows > 0) {
        //     // output data of each row
        //     while($row = $result->fetch_assoc()) {
        //       echo "id: " . $row['ID']. " - Food Name: " . $row["FoodName"]. " - Price: " . $row["Price"]. "<br>";
        //     }
        //   } else {
        //     echo "0 results";
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
        //         $query = "select * from login";
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
            //$con->close();
        ?>