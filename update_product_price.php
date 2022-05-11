<?php

    include_once("./ristrict_guest.php");
    require_once("./connect.php");
    include_once("./get_user_id.php");

    //we need to get the product ID if the product is just saved into the database.

    $product_name = $_GET['product_name'];
    $product_price = $_GET['product_price'];

    if($_GET['product_id']==NULL){
        $product_id = $_GET['product_id'];
    }else{
        //Need to get the product ID.
        echo "Getting the product ID beacuse didnt got one.";
        $sql = "SELECT * FROM products WHERE name='" . $product_name . "';";
        echo $sql;
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $product_id = $row['id'];
        // echo "\nGot the product ID" . $product_id;
    }   

    //Getting the user_id for inserting it into DB.
    $sql = "SELECT * FROM users WHERE username = '".$username."';";  
    echo $sql;
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $user_id = $row['id'];

    //Got Everything just need to check if this price is greater than the previous price.
    $sql = "SELECT * FROM `bids` WHERE product_id=" . $product_id . " AND user_id=" . $user_id . ";";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $product_current_price = $row['price'];
    echo "Product Current Price: " . $product_current_price;
    if($product_current_price == NULL){
        //Product dosent exists in the database. So we need to insert this product into the table.
        $sql = "INSERT INTO `bids`(product_id, user_id, price) VALUES('". $product_id ."', '". $user_id ."', '". $product_price . "');";
        $result = mysqli_query($con, $sql);

        // echo "Inserting the product into intermediate table: " .  $sql;

        if($result){
            //Ok now we redirect the user to product page.
            $location = "location: ./product.php?pid=" . $product_id;
            header($location);
        }
        else{
            echo "Something went wrong while updating the price.";
        }

    }
    else{

        if($product_current_price>$product_price){
            //Current price nust be greater than the previous price.
            echo $product_current_price . "AND price currently is: " . $product_price;
            $location = "location: ./product.php?pid=" . $product_id ."&error=price_is_lower";
            header($location);
        }
        else{
            $sql = "UPDATE `bids` SET price=". $product_price ." WHERE product_id = '". $product_id ."' AND user_id='". $user_id ."';";
            echo $sql;
            $result = mysqli_query($con, $sql);
            $location = "location: ./product.php?pid=" . $product_id ."&success=TRUE";
            header($location);
        }
    }


?>