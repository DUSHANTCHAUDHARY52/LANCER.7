<?php 

    session_start();
    $username = "USERNAME";    //Dont worry we update it at line 6.
    if($_SESSION['username']){
        $username = $_SESSION['username'];
    }
    else{
        echo "You first need to login";
        header("location: ./login.html");
        exit();
    }