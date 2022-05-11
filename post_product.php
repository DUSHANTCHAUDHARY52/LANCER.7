<?php

    include_once("./ristrict_guest.php");
    require_once("./connect.php");

    $product_name = $_POST['name'];
    $product_catagory = $_POST['catagory'];
    $product_price = $_POST['price'];

    //Now we have the username product_name price catagory
    $sql = "select * from users where username = '$username'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    
    $userid = $row['id'];

    $sql = "Insert into `products`(name, catagory, price) VALUES('" . $product_name . "','" . $product_catagory . "','". $product_price . "');";
    $result = mysqli_query($con, $sql);  

    //Now we will call a seperate file for updating the intermediate table of product price and userid and product_id;

    $_GET['product_name'] = $product_name;
    $_GET['user_id'] = $userid;
    $_GET['price'] = $product_price;

    $location = "location: ./update_product_price.php?product_name=" . $product_name . "&product_price=" . $product_price ."&product_id=NULL";
    header($location);
    exit;

?>