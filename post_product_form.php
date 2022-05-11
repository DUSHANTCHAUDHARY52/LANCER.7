<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to continue.</title>
</head>
<body>
    <?php
        include_once("./ristrict_guest.php");
        require_once("./connect.php");
    ?>
    <form action="post_product.php" method="post">
        <label for="username">Name of Product</label>
        <input type="text" name="name" requied>
        <label for="catagory" requied>Catagory</label>
        <input type="text" name="catagory" requied>
        <label for="price" requied>Price</label>
        <input type="number" name="price" requied>
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>