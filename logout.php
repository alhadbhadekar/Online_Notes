<?php

//isset($_SESSION['user_id'] means if user is logged in
if(isset($_SESSION['user_id']) && $_GET['logout'] == 1){
    session_destroy();
    setcookie("rememberme", "", time()-3600); //Destroy cookie
}


?>