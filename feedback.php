<?php include 'header.php'; ?>
<head>
    <title>Feedback</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="css/form.css" >
    <script src="form.js"></script>
</head>
<body class="feedback-body">
    <?php
        $ID = $Name = $Email =  $Del_Time = $Food_quality = $Hospitality = $Description = "";
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $Name = $_REQUEST['name'];
            $Email = $_REQUEST['email'];
            $Del_Time = $_REQUEST['promise_time'];
            $Food_quality = $_REQUEST['food_hot'];
            $Hospitality = $_REQUEST['friendly'];
            $Description = $_REQUEST['description'];
            $sql = "INSERT INTO feedback(ID,Name,Email,Del_time,Food_quality,Hospitality,Description)
            VALUES(0,'$Name','$Email','$Del_Time','$Food_quality','$Hospitality','$Description')";
            $result = $con->query($sql);
            if($result){
                header('location: feedback.php?id=1');
            }else{
                echo "Something is wrong";
            }
        }
    ?>
    <!-- BODY -->
    <section class="grey-bg">
        <div class="container">
            <div class="imagebg"></div>
                <div class="row " style="margin-top: 50px">
                    <div class="col-md-6 col-md-offset-3 form-container">
                    <?php
                        if(isset($_REQUEST['id']) && $_REQUEST['id']==1){ ?>
                            <div class="feedback-response">
                            <?= "Thanks For Your Feedback";?>
                        
                            </div>
                    <?php } ?>
                        <h2> <u>Feedback Form<u> </h2> 
                        <form role="form" method="post" id="reused_form">
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label>Did you receive the delivery within promise time?</label>
                                    <p>
                                        <label class="radio-inline">
									        <input type="radio" name="promise_time" id="promise_time" value="Yes" checked>
                                            Yes 
                                        </label>
                                   
                                        <label class="radio-inline">
                                            <input type="radio" name="promise_time" id="promise_time" value="No" >
                                            No 
                                        </label>
                                    </p>
						        </div>
                            </div>
						
							
						    <div class="row">
                                <div class="col-sm-12 form-group">
								    <label>Did you receive your food hot?</label>
                                    <p>
                                        <label class="radio-inline">
                                            <input type="radio" name="food_hot" id="food_hot" value="Yes" checked>
                                            Yes 
                                        </label>
                                    
                                        <label class="radio-inline">
                                            <input type="radio" name="food_hot" id="food_hot" value="No" >
                                            No 
                                        </label>
                                    </p>
						        </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label>Was the service hospitable and friendly?</label>
                                    <p>
                                        <label class="radio-inline">
                                            <input type="radio" name="friendly" id="friendly" value="Yes" checked>
                                            Yes 
                                        </label>
                                    
                                        <label class="radio-inline">
                                            <input type="radio" name="friendly" id="friendly" value="No" >
                                            No 
                                        </label>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="comments"> Tell us more:</label>
                                    <textarea class="feedback-form-control" type="textarea" name="description" id="description" placeholder="Tell us more" maxlength="6000" rows="7"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label for="name"> Your Name:</label>
                                    <input type="text" class="feedback-form-control" id="name" name="name" placeholder="Enter Your name..."required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="email"> Email:</label>
                                    <input type="email" class="feedback-form-control" id="email" name="email" placeholder="Enter Your e-mail..."required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <button type="submit" class="btn btn-lg btn-warning btn-block" >Submit </button>
                                </div>
                            </div>
                        </form>
                    <!-- <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Posted your feedback successfully!</h3> </div>
                    <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div> -->
                </div>
            </div>
        </div>
    </section>
</body>