<?php

//The user is re-directed to this file after clicking the activation link
//Signup link contains two GET parameters: email and activation key

session_start();
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Account Activation</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
        <style>
            
            h1{
                /*color: rgba(94,143,128);*/
                color: black;
                text-align: center;
                font-weight: bold;
            }
            .contactForm{
                /*border:1px solid #3C554F;*/
                margin-top: 250px;
                border-radius: 15px;
            }
            
            body{
                background: url("typewriter-801921_1920.jpg") no-repeat center center;
                background-attachment: fixed;
                background-size: cover;
                font-family: Arvo, serif;
            }
            
            #login{
                background-color: rgba(94,143,128, 0.8);
            }
            
            #logintext{
                color: black;
            }
        </style> 

    </head>
        <body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10 contactForm">
            <h1>Account Activation</h1>


<?php

//if email or activation key is missing show an error
if(!isset($_GET['email']) || !isset($_GET['key'])){
    echo '<div class="alert alert-danger">There was an error. Please click on the activation link you received by email.</div>'; 
    exit;
}

//else
//Store them in 2 variables

$email = $_GET['email'];
$key = $_GET['key'];


//Prepare variables for the query
$email = mysqli_real_escape_string($link, $email);
$key = mysqli_real_escape_string($link, $key);

$sql = "UPDATE users SET activation='activated' WHERE (email='$email' AND activation='$key') LIMIT 1";
            
//Run the query
$result = mysqli_query($link, $sql);

//If query is successful, show success message and invite user to login
if(mysqli_affected_rows($link) == 1){
    echo '<div class="alert alert-success">Your account has been activated.</div>';
    echo '<a href="index.php" type="button" class="btn-lg btn-sucess" id="login"><span id=logintext>Log in</span><a/>';
}else{
    //Show error message
    echo '<div class="alert alert-danger">Your account could not be activated. Please try again later.</div>';
    echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
}
?>
            
            </div>
    </div>
</div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        </body>
</html>