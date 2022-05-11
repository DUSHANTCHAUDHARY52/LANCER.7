<?php
    include_once("./page_includes/navbar.php");
    include_once("./ristrict_guest.php");
    require_once("./connect.php");

    //getting the information of this product from the URL.

    $product_id = $_GET['pid'];

    $sql = "SELECT * FROM `products` WHERE id=" . $product_id . ";";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  

    //checking the bids for most updated price...
    $sql = "SELECT * FROM `bids` WHERE product_id=" . $product_id . ";";
    $result = mysqli_query($con, $sql);
    $updated_price = mysqli_fetch_array($result, MYSQLI_ASSOC);  

    if($updated_price){
        $price = $updated_price['price'];
    }
    else{
        $price = $row['price'];
    }
    $catagory = $row['catagory'];
    $name = $row['name'];


    echo '
        <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="https://dummyimage.com/400x400">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h2 class="text-sm title-font text-gray-500 tracking-widest">' . $catagory . '</h2>
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">' . $name . '</h1>
                <div class="flex mb-4">
                
                </div>
                <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
                <div class="flex">
                    <span class="mr-3">Color</span>
                    <button class="border-2 border-gray-300 rounded-full w-6 h-6 focus:outline-none"></button>
                    <button class="border-2 border-gray-300 ml-1 bg-gray-700 rounded-full w-6 h-6 focus:outline-none"></button>
                    <button class="border-2 border-gray-300 ml-1 bg-indigo-500 rounded-full w-6 h-6 focus:outline-none"></button>
                </div>
                </div>
                <div>
                    <span class="title-font font-medium text-2xl text-gray-900">$'. $price .'</span><br>
                    <form action="place_bid.php?pid='. $row['id'].'&product_name='. $row['name'].'" method="post" class="flex" style="margin-top: 40px">
                            <input type="number" name="bid_price" id="bid_price" placeholder="  Place your Bid here." style="border: 1px solid grey; border-radius: 5px; width: 350px">
                            <input class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded" type="submit">
                    </form>
                </div>
            </div>
            </div>
        </div>
        </section>
    ';



?>