<?php

    include_once("./ristrict_guest.php");
    require_once("./connect.php");

    $product_id = $_GET['pid'];
    $product_name = $_GET['product_name'];
    $product_price = $_POST['bid_price'];

    //getting the user_id from users table.
    $sql = "select * from users where username = '$username'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  


    echo $product_name;
    $user_id = $row['id'];
    $location = "location: ./update_product_price.php?product_id=" . $product_id . "&product_price=" . $product_price . "&user_id=" . $user_id . "&product_name=" . $product_name;
    header($location);
    exit;