<?php

    $sql = "select * from users where username = '$username'";  
    $result = mysqli_query($con, $sql);  

?>