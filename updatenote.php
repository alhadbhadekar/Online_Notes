<?php
session_start();
include('connection.php');

//get the id of the note sent through Ajax. id is send as id using a POST call through mynotes.js
$id = $_POST['id'];

//get the content of the note
$note = $_POST['note'];

//get the current time
$time = time();

//run a query to update the note
$sql = "UPDATE notes SET note='$note', time = '$time' WHERE id='$id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';   
}

?>