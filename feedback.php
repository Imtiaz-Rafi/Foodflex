<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Feedback Form Using HTML, CSS And PHP - reusable form</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="css/form.css" >
        <script src="form.js"></script>
    </head>
    <body >
        <div class="container">
            <div class="imagebg"></div>
            <div class="row " style="margin-top: 50px">
                <div class="col-md-6 col-md-offset-3 form-container">
                    <h2> <u>Feedback Form<u> </h2> 
                    <form role="form" method="post" id="reused_form">
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>Did you receive the delivery within promise time?</label>
                                <p>
								  
                                    <label class="radio-inline">
									 <input type="radio" name="promise_time" id="promise_time" value="Yes" >
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
                                        <input type="radio" name="food_hot" id="food_hot" value="Yes" >
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
                                        <input type="radio" name="friendly" id="friendly" value="Yes" >
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
                                <label for="comments"> Comments:</label>
                                <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name"> Your Name:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your name..."required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="email"> Email:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your e-mail..."required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn-lg btn-warning btn-block" >Submit </button>
                            </div>
                        </div>
                    </form>
                    <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Posted your feedback successfully!</h3> </div>
                    <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div>
                </div>
            </div>
        </div>
    </body>
</html>