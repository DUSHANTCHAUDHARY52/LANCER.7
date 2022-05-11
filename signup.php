<?php

    //used for validating the signup scripts...
    include_once("./connect.php");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $submit = $_POST['submit'];

    if(isset($submit)){
        //submit button was pressed.

        //make it right.
        $sql = "SELECT * FROM `users` WHERE `username` = '" . $username. "';";
        $users = mysqli_query($con, $sql); 
        $row = mysqli_fetch_array($users, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($users); 

        if($count>0){
            echo "Already user exists with same username";
        }
        else{

            //ok now we need to insert this user into the database.
            //make it right.

            $sql = "INSERT INTO `users`(username, password) VALUES ('" . $username . "', '" . $password ."')";
            $status = mysqli_query($con, $sql); 
            
            echo $sql;
            if($status == TRUE ){
                echo "user inserted successfully now you can login.";
                // Start the session
                session_start();
                $_SESSION["username"] = $username;
                header("Location: ./index.php");
                exit;
            }
            else{
                echo "somthing wrong happend with database.";
            }
        }
    }