<?php
      session_start();
      include 'Connection.php';
      include 'login/login_check.php';
      $data = is_logged($con);
?>
        <?php
        $sql = "SELECT * FROM category";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
          $name = $row['Cat_name'];;
          ?>
            <a href="#<?=$row['Cat_name'];?>"><?=$row['Cat_name'];?></a>
        <?php }

        $cat_sql = "SELECT * FROM category";
        $cat_result = $con->query($cat_sql);
        if($cat_result->num_rows > 0){
            while($cat_row = $cat_result->fetch_assoc()){
                    $rid_link = $cat_row['Cat_name'];
                ?>
            <div id="<?= $cat_row['Cat_name'];?>">
                <h3> <?= $cat_row['Cat_name'];?> </h3>
                <ul>
                    <?php
                        $cat_id = $cat_row['ID'];
                        $sql="SELECT * FROM food_list WHERE cat_id=$cat_id";
                        $result = $con->query($sql);
                        if($result->num_rows>0){
                            while($row = $result->fetch_assoc()){
                                ?>
                        <li>
                            <img src="images/<?= $row["Image"];?>" alt="burger">
                            <div class="beside-img">
                                <h4><?= $row["FoodName"];?></h4> <!-- auto echo -->
                                <div class="d-tab w100">
                                    <span class="price"><?= $row["Price"];?> Taka</span>
                                    <button class="add-item">
                                        
                                        <a href="cart/addcart.php?productid=<?php echo $row['ID'];?>">
                                            <i class="fa fa-plus"></i>
                                            Add
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </li>
                    <?php }} ?>
                </ul>
            </div>
        <?php }} 












        // if($data){
        //   echo $data['Name'];
        // }
        // $sql = "SELECT * FROM lol ORDER BY ID DESC LIMIT 1";
        // $result = $con->query($sql);
        // $ID = 1;
        // while($row=$result->fetch_assoc()){
        //   $ID = $row['ID'];
        // }
        // echo $ID;
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
        //?>