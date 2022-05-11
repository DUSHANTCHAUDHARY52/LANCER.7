<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap -m-4">
        <?php
            $sql = 'SELECT * FROM `products`';
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
            if($result->num_rows == 0){
                //No videos in the database.
            }
            else if($result->num_rows > 0){
                for($i=0; $i<$count;$i++){
                    echo '    
                        <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                            <a class="block relative h-48 rounded overflow-hidden" href="./product.php?pid=' . $row['id'] . '">
                                <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://dummyimage.com/420x260">
                            </a>
                            <div class="mt-4">
                                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">' . $row['catagory'] . '</h3>
                                <h2 class="text-gray-900 title-font text-lg font-medium">' . $row['name'] . '</h2>
                                <p class="mt-1"> $' . $row['price'] . '</p>
                            </div>
                        </div>  
                    ';
                    $row = $result->fetch_assoc();
                }
        
            }

        ?>

    </div>
  </div>
</section>