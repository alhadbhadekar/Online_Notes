<?php
//Connect to the database
$link = mysqli_connect("localhost", "alanboff_onlinenotes", "python", "alanboff_onlinenotes");

if(mysqli_connect_error()){
    die("ERROR: Unable to connect" . mysqli_connect_error());
}
?>