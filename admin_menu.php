<?php
    session_start();
    include 'Connection.php';
    include 'login/login_check.php';
    $admin_data = admin_logged($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php';?>
    <link rel="stylesheet" href="css/style.css">
    <title>Menue</title>
</head>
<body>
    <?php
        $Cat_name = $Cat_nameerror = $FoodName = $FoodNameError = $Price = "";
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if($_REQUEST['id']==2){
                $ID = $_REQUEST['row'];
                $sql = "DELETE FROM category WHERE ID='$ID'";
                $result = $con->query($sql);
            }else if($_REQUEST['id']==0 || $_REQUEST['id']==1){
                $Cat_name = test_data($_REQUEST["cat_name"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/",$Cat_name)) {
                    $Cat_nameerror = "Only letters and white space allowed";
                }
                $sql = "SELECT * FROM category ORDER BY ID DESC LIMIT 1";
                $result = $con->query($sql);
                $ID = 0;
                while($row=$result->fetch_assoc()){
                    $ID = $row['ID'];
                }
                $ID = $ID+1;
                if(empty($Cat_nameerror)){
                    if($_REQUEST['id']==0){
                        $sql = "INSERT INTO category(ID,Cat_name) VALUES('$ID','$Cat_name')";
                        $result = $con->query($sql);
                    }else if($_REQUEST['id']==1){
                        $ID = $_REQUEST['row'];
                        $sql = "UPDATE category SET Cat_name='$Cat_name' WHERE ID='$ID'";
                        $result = $con->query($sql);
                    }
                }else{
                    header("?error");
                }
            }

            else if($_REQUEST['id']==5){
                $ID = $_REQUEST['row'];
                $sql = "DELETE FROM food_list WHERE ID='$ID'";
                $result = $con->query($sql);
            }else if($_REQUEST['id']==3 || $_REQUEST['id']==4){
                $FoodName = test_data($_REQUEST["foodname"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/",$FoodName)) {
                    $FoodNameError = "Only letters and white space allowed";
                }
                $Price = test_data($_REQUEST['price']);
                $Cat_name = $_REQUEST['row'];
                $sql = "SELECT * FROM food_list ORDER BY ID DESC LIMIT 1";
                $result = $con->query($sql);
                $ID = 0;
                while($row=$result->fetch_assoc()){
                    $ID = $row['ID'];
                }
                $ID = $ID+1;
                $altname = $_REQUEST["picture"];
                $filename = $_FILES["uploadfile"]["name"];
                $tempname = $_FILES["uploadfile"]["tmp_name"];   
                $folder = "images/".$filename;
                if(empty($FoodNameError)){
                    if($_REQUEST['id']==3){
                        $sql = "INSERT INTO food_list(ID,FoodName,Price,Image,Cat_name) 
                                VALUES('$ID','$FoodName','$Price','$filename','$Cat_name')";
                        $result = $con->query($sql);
                    }else if($_REQUEST['id']==4){
                        if(empty($filename)){
                            $filename = $altname;
                            $name = $altname;   
                            $folder = "images/".$filename;
                        }
                        $ID = $_REQUEST['row'];
                        $sql = "UPDATE food_list SET FoodName='$FoodName',Price='$Price',Image='$filename' WHERE ID='$ID'";
                        $result = $con->query($sql);
                    }
                    if (move_uploaded_file($tempname, $folder))  {
                        $msg = "Image uploaded successfully";
                    }else{
                        $msg = "Failed to upload image";
                    }
                }
            }

            if($result){
                //echo $filename;
                header('location: admin_menu.php?success');
                return;
            }else{
                header("?error");
            }
        }
        function test_data($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
    <!-- HEADER -->
    <section class="header">
        <div class="container">
            <div class="logo">
                <a href="admin.php"><img src="images/logo.png" alt="Logo"></a>
            </div>
            <div class="nav-area">
                <?php
                    if($admin_data){ $Name = $admin_data['Username']; ?>
                    <ul>
                        <li class="logout">
                            <a href="login/logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                Log Out
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="far fa-user"></i>
                                <?php echo "Hi! ADMIN"?>
                            </a>
                        </li>
                    </ul>

                <?php }else{ ?>
                    <ul>
                        <?php header('location: admin/admin_login.php');?>
                    </ul>
                <?php }?>
            </div>
        </div>
    </section>

    <!-- BODY -->
    <section class="bg-row text-center">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#">Admin Menu</a></li>
            </ul>
        </div>
    </section>
    <section class="grey-bg">
        <div class="container">
            <div class="contain-flex">
                <!-- Category LIST -->
                <div class="col-1">
                    <div class="sidebar">
                        <h3 class="upper">
                            Menu Items
                            <a href="admin_menu.php?crud=0">
                                <button class="crud">
                                    <i class="far fa-plus-square"></i>
                                    Add
                                </button>
                            </a>
                        </h3>
                        <ul>
                            <?php 
                                // ADD to Category
                                if(isset($_REQUEST['crud'])){
                                    if($_REQUEST['crud']==0){ ?>
                                    <form action="admin_menu.php?id=0" method="post">
                                        <input type="text" name="cat_name" class="form-control">
                                        <input type="submit" value="✔" class="btn">
                                        <a href="admin_menu.php" class="cancel">✖</a>
                                    </form>
                                    <?php }
                                }
                                $sql = "SELECT * FROM category";
                                $result = $con->query($sql);
                                if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        ?>
                                        <li>
                                            <!-- CRUD -->
                                            <?php
                                                // UPDATE
                                                if(isset($_REQUEST['crud']) && $_REQUEST['crud']==1 && $_REQUEST['row']==$row['ID']){
                                                    ?>
                                                    <form action="admin_menu.php?id=1&&row=<?=$row['ID']; ?>" method="post">
                                                        <i class="fas fa-chevron-left"></i>
                                                        <input type="text" name="cat_name" value="<?=$row['Cat_name']; ?>" class="form-control">
                                                        <input type="submit" value="✔" class="btn">
                                                        <a href="admin_menu.php" class="cancel">✖</a>
                                                    </form>
                                                <!-- DELETE -->
                                            <?php }else if(isset($_REQUEST['crud']) && $_REQUEST['crud']==2 && $_REQUEST['row']==$row['ID']){
                                                    ?>
                                                    <form action="admin_menu.php?id=2&&row=<?=$row['ID']; ?>" method="post">
                                                        <i class="fas fa-chevron-left"></i>
                                                        <span class="form-control">ARE YOU SURE?</span>
                                                        <input type="submit" value="✔" class="btn">
                                                        <a href="admin_menu.php" class="cancel">✖</a>
                                                    </form>
                                            <?php }else{ ?>
                                                <i class="fas fa-chevron-left"></i>
                                                <a href="#<?= $row['Cat_name'];?>"><?= $row['Cat_name'];?>
                                                    <button class="crud">
                                                        <a href="admin_menu.php?crud=1&&row=<?=$row['ID']; ?>">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </button>
                                                    <button class="crud">
                                                        <a href="admin_menu.php?crud=2&&row=<?=$row['ID']; ?>">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </button>
                                                </a>
                                            <?php }?>
                                        </li>
                            <?php }} ?>
                        </ul>
                    </div>
                </div>
                <!-- FOOD LIST -->
                
                <div class="col-2">
                    <div class="item-mid">
                        <?php
                            $cat_sql = "SELECT * FROM category";
                            $cat_result = $con->query($cat_sql);
                            if($cat_result->num_rows > 0){
                                while($cat_row = $cat_result->fetch_assoc()){
                                        $rid_link = $cat_row['Cat_name'];
                                    ?>
                                <div id="<?= $cat_row['Cat_name'];?>">
                                    <h3> <?= $cat_row['Cat_name'];?> 
                                        <a href="admin_menu.php?crud=3&&row=<?= $cat_row['Cat_name']?>">
                                            <button class="crud">
                                                <i class="far fa-plus-square"></i>
                                                Add New
                                            </button>
                                        </a>
                                    </h3>
                                    
                                    <ul>
                                        <?php
                                            $Cat_name = $cat_row['Cat_name'];
                                            $sql="SELECT * FROM food_list WHERE Cat_name='$Cat_name'";
                                            $result = $con->query($sql);
                                            // ~~ ADD ~~
                                            if(isset($_REQUEST['crud']) && $_REQUEST['crud']==3 && $_REQUEST['row']==$Cat_name){
                                                ?>
                                            <li>
                                                <form action="admin_menu.php?id=3&&row=<?=$_REQUEST['row']; ?>" class="text-center" method="post" enctype="multipart/form-data">
                                                    <input type="name" placeholder="Food Name" name="foodname" class="form-control" required>
                                                    <input type="number" placeholder="Price" name="price" class="form-control" required>
                                                    <input type="text" placeholder="Image" name="image" class="form-control" disabled>
                                                    <input type="file" name="uploadfile" required>
                                                    <input type="submit" value="✔" class="btn">
                                                    <a href="admin_menu.php" class="cancel">✖</a>
                                                </form>
                                            </li>

                                            <?php } 
                                            if($result->num_rows>0){
                                                while($row = $result->fetch_assoc()){
                                                    ?>
                                            <li>
                                                <?php
                                                // UPDATE
                                                if(isset($_REQUEST['crud']) && $_REQUEST['crud']==4 && $_REQUEST['row']==$row['ID']){ ?>
                                                    <form action="admin_menu.php?id=4&&row=<?=$_REQUEST['row']; ?>" method="post" enctype="multipart/form-data">
                                                        <input type="name" value="<?= $row["FoodName"];?>" name="foodname" class="form-control" required>
                                                        <input type="number" value="<?=$row["Price"]; ?>" name="price" class="form-control" required>
                                                        <input type="text" value="<?= $row["Image"];?>" name="picture" class="form-control">
                                                        <input type="file" name="uploadfile" placeholder="Image" required>
                                                        <input type="submit" value="✔" class="btn">
                                                        <a href="admin_menu.php" class="cancel">✖</a>
                                                    </form>
                                                <!-- DELETE -->
                                                <?php }else if(isset($_REQUEST['crud']) && $_REQUEST['crud']==5 && $_REQUEST['row']==$row['ID']){ ?>
                                                    <form action="admin_menu.php?id=5&&row=<?=$row['ID']; ?>" class="text-center" method="post">
                                                        <span class="form-control">ARE YOU SURE to DELETE THIS?</span>
                                                        <input type="submit" value="✔" class="btn">
                                                        <a href="admin_menu.php" class="cancel">✖</a>
                                                    </form>
                                                <?php }else{ ?>
                                                    <img src="images/<?= $row["Image"];?>" alt="Image">
                                                    <div class="beside-img">
                                                        <h4><?= $row["FoodName"];?></h4> <!-- auto echo -->
                                                        <div class="d-tab w100">
                                                            <span class="price"><?= $row["Price"];?> Taka</span>
                                                            <!-- CRUD -->
                                                            <button class="crud">
                                                                <a href="admin_menu.php?crud=4&&row=<?=$row['ID']; ?>">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            </button>
                                                            <button class="crud">
                                                                <a href="admin_menu.php?crud=5&&row=<?=$row['ID']; ?>">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>
                                                                
                                                            </button>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </li>
                                        <?php }}else{?>
                                            <li>
                                                <h3 class="text-center"style="color:rgb(206,18,18)">Add Some Food To This Category</h3>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                        <?php }} ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FOOTER -->
    <!-- <?php // include 'footer.php'?> -->
</body>
</html>