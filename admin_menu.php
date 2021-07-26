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
        // if($_SERVER['REQUEST_METHOD']=='POST'){
        //     $Cat_name = test_data($_REQUEST["cat_name"]);
        //     $sql = "INSERT INTO category(ID,Cat_name) VALUE(0,'$Cat_name')";
        //     $result = $con->query($sql);
        //     if($result){
        //         header('location: admin_menu.php?success');
        //         return;
        //     }else{
        //         echo "WA";
        //     }
        // }
        // function test_data($data){
        //     $data = trim($data);
        //     $data = stripslashes($data);
        //     $data = htmlspecialchars($data);
        //     return $data;
        // }
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
                <li class="nav-item"><a href="#">Menu</a></li>
            </ul>
        </div>
    </section>
    <section class="grey-bg">
        <div class="container">
            <div class="contain-flex">
                <!-- MENU LIST -->
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
                                if(isset($_REQUEST['crud'])){
                                    if($_REQUEST['crud']==0){ ?>
                                    <!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"></form> -->
                                        <!-- <input type="text" name="cat_name" class="form-control">
                                        <input type="submit" value="Add" class="btn"> -->
                                    <?php }
                                }
                                $sql = "SELECT * FROM category";
                                $result = $con->query($sql);
                                if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        ?>
                                        <li>
                                            <i class="fas fa-chevron-left"></i>
                                            <a href="#<?= $row['Cat_name'];?>"><?= $row['Cat_name'];?>
                                                <!-- CRUD -->
                                                <button class="crud">
                                                    <a href="admin_menu.php?crud=1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </button>
                                                <button class="crud">
                                                    <a href="admin_menu.php?crud=2">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </button>
                                            </a>
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
                                        <button class="crud">
                                            <i class="far fa-plus-square"></i>
                                            Add New
                                        </button>
                                    </h3>
                                    
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
                                                        <!-- CRUD -->
                                                        <button class="crud">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="crud">
                                                            <i class="fas fa-trash-alt"></i>
                                                            
                                                        </button>
                                                        <!-- <button class="add-item">
                                                            <a 
                                                            <?php if($data){?> 
                                                                href="cart/addcart.php?productid=<?php echo $row['ID'];?>"
                                                            <?php }else{ ?>
                                                                href="menu.php?logged=0"
                                                            <?php }?>>
                                                                <i class="fa fa-plus"></i>
                                                                Add
                                                            </a>
                                                        </button> -->
                                                    </div>
                                                </div>
                                            </li>
                                        <?php }} ?>
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